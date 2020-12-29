<?php

namespace cob41\Amp;

use cob41\Amp\AmpException;
use AmpProject\Optimizer\ErrorCollection;
use AmpProject\Optimizer\TransformationEngine;

class Amp {

  public $debug = false;
  private $engine;

  function __construct($conf = null) {
    $this->debug = $conf['debug'] || false;
    $this-> $transformationEngine = new TransformationEngine();  

  }


  function optimize(String $content){
      
      $errorCollection      = new ErrorCollection;

      $optimizedHtml = $transformationEngine->optimizeHtml(
        $content,                               
        $errorCollection                             
      );

      if($this->debug){
        // throw new AmpException()
      }


      return $optimizedHtml;

  }
  
}
