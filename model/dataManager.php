<?php

require_once 'dataBase.php';

// A class to manage the crud of an entity
//The order of the arguments always respect the native sql order
//table refers to target table to pass as a string like "sample"
//assoArray is an associative array to pass when value are associated to key

class dataManager {

use  dataBase;

//
//~~~~~~~~~  Get data function  ~~~~~~~~~~~
//

// Get all the data from a specific table
  public function getAll($table) {
    $request = 'SELECT * FROM' . " " . $table;
    $query = $this->getPDO()->query($request);
    $query = $query->fetchAll();
    return $query;
  }

// Get the data from a specific table with one condition like WHERE name="sample"
  public function getWhere($table, $assoArray) {
    foreach ($assoArray as $key => $value) {
      $parameter = $key;
      $val = $value;
    }
    $request = 'SELECT * FROM' . " " . $table . " " . 'WHERE ' . " " . $parameter . '= ?';
    $query = $this->getPDO()->prepare($request);
    $query->execute(array($val));
    $query = $query->fetch();
    return $query;
  }

// Get all the data from a table but only for specifiques rows like GET id, name FROM table
//store the rows in an array : here it is $rows
  public function getByRow($rows, $table) {
    $request = 'SELECT ';
    foreach ($rows as $row) {
      if ($row != end($rows)) {
        $request .= " " . $row . ",";
      }
      else {
        $request .= " " . $row;
      }
    }
    $request .= ' FROM' . " " . $table;
    $query = $this->getPDO()->query($request);
    $query = $query->fetchAll();
    return $query;
  }

  //
  //~~~~~~~~~  Delete function  ~~~~~~~~~~~
  //

//Delete everything from a specific table
  public function deleteAll($table) {
    $request = 'DELETE FROM' . " " . $table;
    $query = $this->getPDO()->query($request);
  }

// Delete from a table with a condtion passed as an associative array
  public function deleteWhere($table, $assoArray) {
    foreach ($assoArray as $key => $value) {
      $parameter = $key;
      $val = $value;
    }

    $request = 'DELETE FROM' . " " . $table . " " . 'WHERE ' . " " . $parameter . '=?';
    $query = $this->getPDO()->prepare($request);
    $query->execute(array($val));
  }

  //
  //~~~~~~~~~  Insert function  ~~~~~~~~~~~
  //

// Insert into a specific table keys with their values in an associative array
  public function insertInto($table, $assoArray) {
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
    $query->execute($val);
  }

  //
  //~~~~~~~~~  Update function  ~~~~~~~~~~~
  //

  // Update a specific table with new values for specififed keys in the associative array
  // The last entry in the array is the WHERE condition to target a specific entity
  public function updateTable($table, $assoArray) {
    $request = 'UPDATE' . " " . $table . " " . 'SET';
    $count = 1;
    $val = array();
    foreach ($assoArray as $key => $value) {
      if ($value != end($assoArray) ) {
        if ($count < count($assoArray)-1) {
          $request .= " " . $key . "=?,";
          $count += 1;
        }
        else {
          $request .= " " . $key . "=?";
          $count += 1;
        }
      }
      else {
        $request .= " " . 'WHERE' . " " . $key . "=?";
      }
      array_push($val, $value);
    }
    $query = $this->getPDO()->prepare($request);
    $query->execute($val);
  }

}

 ?>
