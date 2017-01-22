<?php

require_once "Hydrator.php";
/**
 *
 */

class Client {

  use Hydrator;

  private $id;
  private $firstname;
  private $age;

//  Setters

public function setId($id) {
  $this->id = $id;
}

public function setFirstname($firstname) {
  $this->firstname = $firstname;
}

public function setAge($age) {
  $this->age = $age;
}

//  Getters

public function getId() {
  return $this->id;
}

public function getFirstname() {
  return $this->firstname;
}

public function getAge() {
  return $this->age;
}

function __construct(array $donnees)
{
    $this->hydrate($donnees);
}

}

 ?>
