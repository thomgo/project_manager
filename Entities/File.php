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
  private $alt;

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

  public function setAlt($alt)
  {
    $this->alt = $alt;
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

  public function getAlt() {
    return $this->alt;
  }

  function __construct(array $donnees)
  {
      $this->hydrate($donnees);
  }

}

 ?>
