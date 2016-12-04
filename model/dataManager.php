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

  public function getById($id) {
    $query = $this->getPDO()->prepare('SELECT * FROM client WHERE id= ?' );
    $query->execute(array($id));
    $query = $query->fetch();
    return $query;
  }

  public function getByRow() {
    $query = $this->getPDO()->query("SELECT name, age FROM client" );
    $query = $query->fetchAll();
    return $query;
  }

// Delete functions
  public function deleteAll() {
    $query = $this->getPDO()->query("DELETE FROM client");
  }

  public function deleteById($id) {
    $query = $this->getPDO()->prepare('DELETE FROM client WHERE id= ?' );
    $query->execute(array($id));
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
