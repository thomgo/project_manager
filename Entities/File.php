<?php

require_once "Hydrator.php";
/**
 *
 */

class File {

  use Hydrator;

  private $id;
  private $name;
  private $type;
  private $size;
  private $path;

  // Setters

  public function setId($id)
  {
    $this->id = $id;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function setType($type)
  {
    $this->type = $type;
  }

  public function setSize($size)
  {
    $this->size = $size;
  }

  public function setPath($path)
  {
    $this->path = $path;
  }

  // Getters

  public function getId() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }

  public function getType() {
    return $this->type;
  }

  public function getSize() {
    return $this->size;
  }

  public function getPath() {
    return $this->path;
  }

  function __construct(array $donnees)
  {
      $this->hydrate($donnees);
  }

}

 ?>
