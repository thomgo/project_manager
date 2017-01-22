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

//
//~~~~~~~~~ Management functions ~~~~~~~~~~~
//

// Insert into a specific table the data from the fileRegister function
  public function insertFile($table, $assoArray) {

    // Sanitize the data before insertion in order to protect the data base
    $assoArray = $this->validateForm($assoArray);

    // If the data is OK you get back an array from validateForm that can be inserted
    if (gettype($assoArray) === "array") {
      $request = 'INSERT INTO' . " " . $table;
      $row = "(";
      $val = array ();
      $values = "(";
      $count = 1;
      foreach ($assoArray as $key => $value) {
          if ($count != count($assoArray)) {
            $row .= $key . ",";
            array_push($val, $value);
            $values .= "?,";
            $count += 1;
          }
          else {
            $row .= $key;
            array_push($val, $value);
            $values .= "?";
          }

      }
      $row .= ")";
      $values .= ")";
      $request .= $row . " " . 'VALUES' . " " . $values;
      $query = $this->getPDO()->prepare($request);

      if ($query->execute($val)) {
        return true;
      }
      else {
        return false;
      }
    }

    // Otherwise you get back an error message that is displayed
    else {
      echo "<article class='errorMessage'>" . $assoArray . "<article>";
    }

  }

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
      $this->insertFile($fileGroup, ["name"=>$name, "type"=>$type, "path"=>$this->$pathMethode() . $name, "size"=>$size, "alt"=>$_POST["alt"]]);
      move_uploaded_file($tmpname, $this->$pathMethode() . $name);
    }
    else {
      $this->insertFile($fileGroup, ["name"=>$name, "type"=>$type, "path"=>$this->$pathMethode() . $name, "size"=>$size, "alt"=>$name]);
      move_uploaded_file($tmpname, $this->$pathMethode() . $name);
    }
  }
// If an error has been detected earlier it displays the error message
  else  {
    echo $fileError;
  }
}

// function to have a common key between a file and an other entity
//take an associative array with two entries, the table and the related key

public function binTables($firstTable, $secondTable, $key) {

  // get the last insert row in the first table
  $request = 'SELECT * FROM' . " " . $firstTable . " " . 'ORDER BY id DESC LIMIT 0, 1';
  $firstEntity = $this->getPDO()->query($request);
  $firstEntity = $firstEntity->fetch(PDO::FETCH_ASSOC);

  // get the last insert row in the second table
  $request = 'SELECT * FROM' . " " . $secondTable . " " . 'ORDER BY id DESC LIMIT 0, 1';
  $secondEntity = $this->getPDO()->query($request);
  $secondEntity = $secondEntity->fetch(PDO::FETCH_ASSOC);

  // Use the data manager to update the tables and bind them
  $this->updateTable($secondTable, [$key=>$firstEntity["id"], "id"=>$secondEntity["id"]]);
}

// Function to display the image in the view
  public function img( File $file) {
    echo '"<img src="' . $file->getPath() . '" alt="' . $file->getAlt() . '">';
  }
}

 ?>
