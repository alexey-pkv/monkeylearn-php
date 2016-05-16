<?php
namespace MonkeyLearn;


class MonkeyLearnResponse 
{
    public function __construct($result, $headers) {
        $lastHeaders = end($headers);
        
        $this->result = $result;
        $this->query_limit_remaining = $lastHeaders['X-Query-Limit-Remaining'];
        $this->headers = $headers;
    }
}