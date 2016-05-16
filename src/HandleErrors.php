<?php
namespace MonkeyLearn;


class HandleErrors 
{
    public static function check_batch_limits($text_list, $batch_size) {
        if ($batch_size > Config::MAX_BATCH_SIZE || $batch_size < Config::MIN_BATCH_SIZE) {
            $minSize = Config::MIN_BATCH_SIZE;
            $maxSize = Config::MAX_BATCH_SIZE;
            
            throw new MonkeyLearnException("batch_size has to be between {$minSize} and {$maxSize}");
        }
        
        if (!$text_list) {
            throw new MonkeyLearnException("The text_list can't be empty");
        }
        
        if (in_array('', $text_list)) {
            $firstPosition = array_search('', $text_list);
            throw new MonkeyLearnException("You have an empty text in position {$firstPosition} in text_list");
        }
    }
}