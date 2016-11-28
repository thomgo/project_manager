<?php



class dataManager {

  public function test($value) {
    return $value;
  }

  public function getAll() {
    require "bd.php";
    $query = $bdd->query('SELECT * FROM client');
    $query = $query->fetchAll();
    return $query;
  }

}

 ?>
