<?php
namespace MonkeyLearn;


class Categories extends SleepRequests 
{
    public function __construct($token, $base_endpoint) {
        $this->token = $token;
        $this->endpoint = $base_endpoint.'classifiers/';
    }

    public function create($module_id, $name, $parent_id, $sleep_if_throttled=true) {
        $data = array(
            'name' => $name,
            'parent_id' => $parent_id,
        );

        $url = $this->endpoint.$module_id.'/categories/';
        list($response, $header) = $this->make_request($url, 'POST', $data, $sleep_if_throttled);
        return new MonkeyLearnResponse($response['result'], array($header));
    }

    public function edit($module_id, $category_id, $name=null, $parent_id=null,
                  $sleep_if_throttled=true) {

        $data = array(
            'name' => $name,
            'parent_id' => $parent_id,
        );

        foreach($data as $key => $val) {
            if (!$val) {
                unset($data[$key]);
            }
        }

        $url = $this->endpoint.$module_id.'/categories/'.$category_id.'/';
        list($response, $header) = $this->make_request($url, 'PATCH', $data, $sleep_if_throttled);
        return new MonkeyLearnResponse($response['result'], array($header));
    }

    public function delete($module_id, $category_id, $samples_strategy=null,
                    $samples_category_id=null, $sleep_if_throttled=true) {

        $data = array(
            'samples-strategy' => $samples_strategy,
            'samples-category-id' => $samples_category_id,
        );

        foreach($data as $key => $val) {
            if (!$val) {
                unset($data[$key]);
            }
        }

        $url = $this->endpoint.$module_id.'/categories/'.$category_id.'/';
        list($response, $header) = $this->make_request($url, 'DELETE', $data, $sleep_if_throttled);
		
        return new MonkeyLearnResponse($response['result'], array($header));
    }
}