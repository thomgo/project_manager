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
  private $description;
  private $dueDate;

  // Setters

  public function setId($id)
  {
    $this->id = $id;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function setDescription($description)
  {
    $this->description = $description;
  }

  public function setDueDate($dueDate)
  {
    $this->dueDate = $dueDate;
  }
  //Getters

  public function getId() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }

  public function getDescription() {
    return $this->description;
  }

  public function getDueDate() {
    return $this->dueDate;
  }

  function __construct(array $donnees)
  {
      $this->hydrate($donnees);
  }

}

 ?>
