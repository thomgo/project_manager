<?php

class form {

  public function formStart($action, $class=false) {
    if ($class) {
      echo '<form action=' . $action.  ' method="post" class='. $class .'>';
    }
    else {
      echo '<form action=' . $action.  ' method="post">';
    }
  }

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

  public function emailInput($name, $label, $required=false) {
    if ($required && $required = "Required" || "required") {
      echo '<label>' . $label . '<input type="email" name=' . $name . ' required ></label>';
    }
    else {
      echo '<label>' . $label . '<input type="email" name=' . $name . '></label>';
    }
  }

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

  public function submitButton($value) {
    echo '<input type="submit" value=' . $value .'>';
  }

  public function formEnd() {
    echo '</form>';
  }

}

 ?>
