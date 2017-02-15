<?php

require_once "Hydrator.php";
/**
 *
 */
class Step {

// Hydrating function
  use Hydrator;

  private $id;

  // I strongly recommand you make this attribute case sensitive in MySql setting its attribute to Binary
  private $name;
  private $description;
  private $dueDate;
  //A boolean, if true the project is in the archive
  private $status;
  private $projectId;
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
    $dueDate = date_format(date_create($dueDate), 'd-m-Y');
    $this->dueDate = $dueDate;
  }

  public function setStatus($status)
  {
    $this->status = $status;
  }

  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
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

  public function getStatus() {
    return $this->status;
  }

  public function getProjectId() {
    return $this->projectId;
  }

  function __construct(array $donnees)
  {
      $this->hydrate($donnees);
  }

}

 ?>