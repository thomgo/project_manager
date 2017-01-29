<?php

require_once "Hydrator.php";
/**
 *
 */
class Liste {

// Hydrating function
  use Hydrator;

  private $id;

  // I strongly recommand you make this attribute case sensitive in MySql setting its attribute to Binary
  private $name;

  // Setters

  public function setId($id)
  {
    $this->id = $id;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  //Getters

  public function getId() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }

  function __construct(array $donnees)
  {
      $this->hydrate($donnees);
  }

}

 ?>
