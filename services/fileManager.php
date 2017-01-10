<?php

class fileManager {

  public function test(){
    echo "ça marche";
  }

  public function img( File $file) {
    echo "<img src=" . $file->getPath() . " alt=" . $file->getType() . ">";
  }
}

 ?>
