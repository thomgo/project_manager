<?php

require_once "Hydrator.php";
/**
 *
 */
class Action {

// Hydrating function
  use Hydrator;

  private $id;

  // I strongly recommand you make this attribute case sensitive in MySql setting its attribute to Binary
  private $name;
  private $status;
  private $stepId;
  // Setters

  public function setId($id)
  {
    $this->id = $id;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function setStatus($status)
  {
    $this->status = $status;
  }


  public function setStepId($stepId)
  {
    $this->stepId = $stepId;
  }

  //Getters

  public function getId() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }

  public function getStatus() {
    return $this->status;
  }

  public function getStepId() {
    return $this->stepId;
  }

  function __construct(array $donnees)
  {
      $this->hydrate($donnees);
  }

}

 ?>
