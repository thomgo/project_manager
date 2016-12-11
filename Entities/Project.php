<?php
require_once "Hydrator.php";
/**
 *
 */
class Project {

// Hydrating function
  use Hydrator;

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

}


 ?>
