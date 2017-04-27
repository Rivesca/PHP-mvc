<?php

  class HomeController extends Slax{
    function __construct(){
      // Home constructor
      $this->model('Home');
      $this->view('Home');
    }
    function hello(){
      print 'Hello world';
    }
  }


 ?>
