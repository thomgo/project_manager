<?php

// Allow a dynamic loading of the classes

class Autoloader{

// Static function to call the autoloader
    static function register(){
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

// List the different paths to the classes to load

    static function autoload($class){
      if ($class == "dataManager") {
        require_once 'model/' . $class . '.php';
      }
      elseif ($class == "form") {
        require_once 'forms/' . $class . '.php';
      }
      else {
        require_once 'Entities/' . $class . '.php';
      }

    }

}

 ?>
