<?php

// A trait that aims to treat the different variable that you get from your forms
// It will make sure that no script is injected for exemple

trait Validator {

  public function validateForm($assoArray) {
    foreach ($assoArray as $key => $value) {
      if (gettype($value) === "string") {
        $assoArray[$key] = filter_var($value, FILTER_SANITIZE_STRING);
      }
    }
    return $assoArray;
  }

}

 ?>
