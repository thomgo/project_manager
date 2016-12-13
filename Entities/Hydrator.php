<?php

trait Hydrator {

// When an array is passed to a new object, foreach the array and make a setter with the key
  public function hydrate (array $donnees) {
    foreach ($donnees as $key=>$value) {

      $methode = 'set'. ucfirst($key);
      if (method_exists($this, $methode)) {
      $this->$methode($value);
      }
    }
  }


}

 ?>
