<?php

class form {

  public function formStart() {
    echo '<form action= methode=\'post\'>';
  }

  public function formInput() {
    echo '<input type=\'text\' name=\'firstname\'>';
  }

  public function formEnd() {
    echo '</form>';
  }

  public function test() {
    echo "test form";
  }
}

 ?>
