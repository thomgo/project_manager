<?php

// Get the validator trait to secure the variables from the form
require_once'Validator.php';

// This class is a form builder that aims to spare you a lot of time parametring your forms
// Use the different functions below to display a form in your html via a form object

class Form {

  use Validator;

// The function to add the first form tag, first specify the file to send the data as a string
// You can also add a class as a string but this is optional

  public function formStart($action, $class=false) {
    if ($class) {
      echo '<form action=' . $action.  ' method="post" class='. $class .'>';
    }
    else {
      echo '<form action=' . $action.  ' method="post">';
    }
  }

// Now come all the functions to display inputs with different types
// First you always specifiy the name as a string if you want to work tables of data
// Then you specifiy the label as a string
// If the input has multiple choices you set them in a table
// At last you can specify as a string if the field is required but it is optional

  public function textInput($name, $label, $required=false) {
    if ($required && $required = "Required" || "required") {
      echo '<label>' . $label . '<input type="text" name=' . $name . ' required ></label>';
    }
    else {
      echo '<label>' . $label . '<input type="text" name=' . $name . '></label>';
    }
  }

  public function numberInput($name, $label, $required=false) {
    if ($required && $required = "Required" || "required") {
      echo '<label>' . $label . '<input type="number" name=' . $name . ' required ></label>';
    }
    else {
      echo '<label>' . $label . '<input type="number" name=' . $name . '></label>';
    }
  }

  public function passwordInput($name, $label, $required=false) {
    if ($required && $required = "Required" || "required") {
      echo '<label>' . $label . '<input type="password" name=' . $name . ' required ></label>';
    }
    else {
      echo '<label>' . $label . '<input type="password" name=' . $name . '></label>';
    }
  }

  public function radioInput($name, $label, $array, $required=false) {
    if ($required && $required = "Required" || "required") {
      echo '<label>' . $label;
      foreach ($array as $value) {
        echo '<input type="radio" name=' . $name . ' value=' . $value . ' required >' . $value;
      }
      echo '</label>';
    }
    else {
      echo '<label>' . $label;
      foreach ($array as $value) {
        echo '<input type="radio" name=' . $name . ' value=' . $value .'>' . $value;
      }
      echo '</label>';
    }
  }

  public function checkboxInput($name, $label, $array, $required=false) {
    if ($required && $required = "Required" || "required") {
      echo '<label>' . $label;
      foreach ($array as $value) {
        echo '<input type="checkbox" name=' . $name . ' value=' . $value . ' required >' . $value;
      }
      echo '</label>';
    }
    else {
      echo '<label>' . $label;
      foreach ($array as $value) {
        echo '<input type="checkbox" name=' . $name . ' value=' . $value .'>' . $value;
      }
      echo '</label>';
    }
  }

  public function fileInput($name, $label, $required=false) {
    if ($required && $required = "Required" || "required") {
      echo '<label>' . $label . '<input type="file" name=' . $name . ' required ></label>';
    }
    else {
      echo '<label>' . $label . '<input type="file" name=' . $name . '></label>';
    }
  }

  public function searchInput($name, $label, $required=false) {
    if ($required && $required = "Required" || "required") {
      echo '<label>' . $label . '<input type="search" name=' . $name . ' required ></label>';
    }
    else {
      echo '<label>' . $label . '<input type="search" name=' . $name . '></label>';
    }
  }

  public function urlInput($name, $label, $required=false) {
    if ($required && $required = "Required" || "required") {
      echo '<label>' . $label . '<input type="url" name=' . $name . ' required ></label>';
    }
    else {
      echo '<label>' . $label . '<input type="url" name=' . $name . '></label>';
    }
  }

  public function telInput($name, $label, $required=false) {
    if ($required && $required = "Required" || "required") {
      echo '<label>' . $label . '<input type="tel" name=' . $name . ' required ></label>';
    }
    else {
      echo '<label>' . $label . '<input type="tel" name=' . $name . '></label>';
    }
  }

  public function colorInput($name, $label, $required=false) {
    if ($required && $required = "Required" || "required") {
      echo '<label>' . $label . '<input type="color" name=' . $name . ' required ></label>';
    }
    else {
      echo '<label>' . $label . '<input type="color" name=' . $name . '></label>';
    }
  }

  public function emailInput($name, $label, $required=false) {
    if ($required && $required = "Required" || "required") {
      echo '<label>' . $label . '<input type="email" name=' . $name . ' required ></label>';
    }
    else {
      echo '<label>' . $label . '<input type="email" name=' . $name . '></label>';
    }
  }

// Functions to display a textarea and a select fields. Work as the input functions

  public function textArea($name, $label, $required=false) {
    if ($required && $required = "Required" || "required") {
      echo '<label>' . $label . '<textarea name=' . $name . ' required ></textarea></label>';
    }
    else {
      echo '<label>' . $label . '<textarea name=' . $name . '></textarea></label>';
    }
  }

  public function selectField($name, $label, $array, $required=false) {
    if ($required && $required = "Required" || "required") {
      echo '<label>' . $label . '<select name=' . $name . ' required >';
      foreach ($array as $option) {
        echo '<option>' . $option . '</option>';
      }
      echo '</select></label>';
    }
    else {
      echo '<label>' . $label . '<select name=' . $name . '>';
      foreach ($array as $option) {
        echo '<option>' . $option . '</option>';
      }
      echo '</select></label>';
    }
  }

// Function to display a submit button, the value (string type) is what appears on the button

  public function submitButton($value) {
    echo '<input type="submit" value= ' . $value .'>';
  }

// Function to display the closing form tag

  public function formEnd() {
    echo '</form>';
  }

}

 ?>
