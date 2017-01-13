<?php

class fileManager {

// Store your files paths in properties as string
// The name of the property will appear in the file input name

private $sample = "assets/img/sample/";

// Setters

public function setSample($path) {
  $this->sample = $path;
}

//Getters

public function getSample(){
  return $this->sample;
}

// Management functions

  public function img( File $file) {
    echo '"<img src="' . $file->getPath() . '" alt="' . $file->getAlt() . '">';
  }
}

 ?>
