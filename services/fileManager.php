<?php

class fileManager extends dataManager {

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

// Function to check the file and register it if it is OK
// You need to specify the type of fille in your form respecting this pattern : "file/pathproperty"

public function fileRegister() {

// The fileGroup variable get the type of your file in order to get the related path
  $fileGroup = explode("/", key($_FILES));
  $fileGroup = $fileGroup[1];

// Here we start to check for the error code in the $_FILES variable
  $fileError = "";

  switch ($_FILES[key($_FILES)]["error"]) {
    case 1:
      $fileError .= "Your file is too big for the server";
      break;

    case 2:
      $fileError .= "The size of you file is too big for this form";
      break;

    case 3:
      $fileError .= "Something went wrong with the downloading";
      break;

    case 7:
      $fileError .= "Your file could not be saved";
      break;
  }

  $nameCheck = $this->getWhere($fileGroup, ["name"=>$_FILES[key($_FILES)]["name"]]);

    if (!empty($nameCheck)) {
      $fileError .= "Sorry but this file name is already used";
    }

// If there is no error we can procede the registration in the database
  if (strlen($fileError)=== 0) {
    $pathMethode = "get". ucfirst($fileGroup);
    $name = $_FILES[key($_FILES)]["name"];
    $tmpname = $_FILES[key($_FILES)]["tmp_name"];
    $type = $_FILES[key($_FILES)]["type"];
    $size = $_FILES[key($_FILES)]["size"];

    if (isset($_POST["alt"])) {
      $this->insertInto($fileGroup, ["name"=>$name, "type"=>$type, "path"=>$this->$pathMethode() . $name, "size"=>$size, "alt"=>$_POST["alt"]]);
      move_uploaded_file($tmpname, $this->$pathMethode() . $name);
    }
    else {
      $this->insertInto($fileGroup, ["name"=>$name, "type"=>$type, "path"=>$this->$pathMethode() . $name, "size"=>$size, "alt"=>$name]);
      move_uploaded_file($tmpname, $this->$pathMethode() . $name);
    }
  }
// If an error has been detected earlier it displays the error message
  else  {
    echo $fileError;
  }
}

// Function to display the image in the view
  public function img( File $file) {
    echo '"<img src="' . $file->getPath() . '" alt="' . $file->getAlt() . '">';
  }
}

 ?>
