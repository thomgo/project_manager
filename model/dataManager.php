<?php

require_once 'dataBase.php';

// A sample class to manage the crud of an entity
class dataManager extends dataBase {

  public function test($value) {
    return $value;
  }

// Get data functions
  public function getAll() {
    $query = $this->getPDO()->query("SELECT * FROM client" );
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

  public function deleteAll() {
    $query = $this->getPDO()->query("DELETE FROM client");
  }

}

 ?>
