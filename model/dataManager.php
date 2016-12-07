<?php

require_once 'dataBase.php';

// A sample class to manage the crud of an entity
class dataManager extends dataBase {

// Get data functions
  public function getAll($table) {
    $request = 'SELECT * FROM' . " " . $table;
    $query = $this->getPDO()->query($request);
    $query = $query->fetchAll();
    return $query;
  }

  public function getWhere($table, $assoArray) {
    foreach ($assoArray as $key => $value) {
      $parameter = $key;
      $val = $value;
    }
    $request = 'SELECT * FROM' . " " . $table . " " . 'WHERE ' . " " . $parameter . '= ?';
    $query = $this->getPDO()->prepare($request);
    $query->execute(array($val));
    $query = $query->fetchAll();
    return $query;
  }

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
    // $query = $this->getPDO()->query("SELECT name, age FROM client" );
    $query = $this->getPDO()->query($request);
    $query = $query->fetchAll();
    return $query;
  }

// Delete functions
  public function deleteAll($table) {
    $request = 'DELETE FROM' . " " . $table;
    $query = $this->getPDO()->query($request);
  }

  public function deleteWhere($table, $assoArray) {
    foreach ($assoArray as $key => $value) {
      $parameter = $key;
      $val = $value;
    }

    $request = 'DELETE FROM' . " " . $table . " " . 'WHERE ' . " " . $parameter . '=?';
    $query = $this->getPDO()->prepare($request);
    $query->execute(array($val));
  }

  // Insert functions
  public function insertInto($name, $age) {
    $query = $this->getPDO()->prepare("INSERT INTO client(name, age) VALUES (?, ?)");
    $query->execute(array($name, $age));
  }

  // Update function
  public function updateTable($name, $age, $id) {
    $query = $this->getPDO()->prepare("UPDATE client SET name=?, age=? WHERE id=?");
    $query->execute(array($name, $age, $id));
    header("Refresh:0");
  }

}

 ?>
