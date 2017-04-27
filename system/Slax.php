<?php

  require_once('Config.php');

  class Slax{
    function get($param){
       return htmlspecialchars($_GET[$param], ENT_QUOTES, 'UTF-8');
    }
    function model($name){
       $class = $name.'Model';
       $file = APPLICATION.'/Model/'.$class.'.php';
        if(file_exists($file)){
          require_once($file);
           if( class_exists($class) ){
             $new = new $class;
           } else {
             print 'Class '.$class.' not exists';
           }
        } else {
          print 'Model '.$name.' not exists';
        }
    }
    function view($name){
        $file = APPLICATION.'/View/'.$name.'/index.php';
        if(file_exists($file)){
          require_once($file);
        } else {
          print 'View '.$name.' not exists';
        }
    }
  }

 ?>
