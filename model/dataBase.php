<?php

class dataBase {

  public function getPDO() {
    // Test the connexion
    try {
      $pdo = new PDO('mysql:host=localhost;dbname=framework;charset=utf8', 'root', 'ThomAdmin12');
    }
    // If the connection is impossible get the error message
    catch (Exception $exception) {
      die ('erreur :'. $exception->getMessage());
    }
    return $pdo;
  }

}

 ?>
