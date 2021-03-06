<?php
namespace MonkeyLearn;


class Pipelines extends SleepRequests 
{
    public function __construct($token, $base_endpoint) {
        $this->token = $token;
        $this->endpoint = $base_endpoint.'pipelines/';
    }
    
    public function run($module_id, $data, $sandbox = false, $sleep_if_throttled = true) {
        $url = $this->endpoint . $module_id . '/run/';
        
        if ($sandbox) {
            $url .= '?sandbox=1';
        }
        
        list($response, $header) = $this->make_request($url, 'POST', $data, $sleep_if_throttled);
        
        return new MonkeyLearnResponse($response['result'], array($header));
    }
}