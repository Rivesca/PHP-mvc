<?php

  class Routing extends Slax{
    function __construct(){
      $this->url();
      $this->controller();
    }
    private function url(){ // load url
      $this->controller = ucfirst($this->get('controller'));
       if( empty($this->controller) ){
          $this->controller = CONTROLLER;
       }
      $this->method = ucfirst($this->get('method'));
    }
    private function controller(){ // load controller
        $class = $this->controller.'Controller';
        $file = APPLICATION.'/Controller/'.$class.'.php';
         if( file_exists($file) ){
            require_once($file);
            $controller = $this->controller.'Controller';
             if( class_exists($controller) ){
               $new = new $controller;
               $this->method($new,$class);
             } else {
               print 'Class '.$controller.' not exists';
             }
         } else {
            print 'Controller '.$this->controller.' not exists';
         }
    }
    private function method($new,$class){ // load method
        $method = $this->method;
        if(!empty( $method )){
          if( method_exists($new,$method) ){
             $new->$method();
         } else {
             print 'Method '.$method.' not exists';
         }
        }
    }
  }
  $Routing = new Routing;

 ?>
