<?php
  include_once "classes/database.class.php";
    spl_autoload_register(function($class){
        include 'classes/'.$class.'.class.php';
    });
?>