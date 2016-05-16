<?php
namespace MonkeyLearn;


class Client 
{
    /** @var Classification */
    public $classifiers;
    
    /** @var Extraction */
    public $extractors;
    
    /** @var Pipelines */
    public $pipelines;
    
    
    public function __construct($token, $base_endpoint = Config::DEFAULT_BASE_ENDPOINT) {
        $this->classifiers  = new Classification($token, $base_endpoint);
        $this->extractors   = new Extraction($token, $base_endpoint);
        $this->pipelines    = new Pipelines($token, $base_endpoint);
    }
}