<?php

/**
 *
 */
class Project
{

  private $id;
  private $title;
  private $text;
  private $client_id;

  // Setters

  public function setId($id)
  {
    $this->id = $id;
  }

  public function setTitle($title)
  {
    $this->title = $title;
  }

  public function setText($text)
  {
    $this->text = $text;
  }

  public function setClient_id($clientid)
  {
    $this->client_id = $clientid;
  }

  // Getters

  public function getId() {
    return $this->id;
  }

  public function getTitle() {
    return $this->title;
  }

  public function getText() {
    return $this->text;
  }

  public function getClient_id() {
    return $this->client_id;
  }

  function __construct(array $donnees)
  {
      $this->hydrate($donnees);
  }

  public function hydrate (array $donnees) {
    foreach ($donnees as $key=>$value) {

      $methode = 'set'. ucfirst($key);
      if (method_exists($this, $methode)) {
      $this->$methode($value);
      }
    }
  }

}


 ?>
