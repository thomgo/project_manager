<?php

require_once "Hydrator.php";
/**
 *
 */
class User {

// Hydrating function
  use Hydrator;

  private $id;
  private $pseudo;
  private $password;
  private $email;
  private $inscriptionDate;


  // Setters

  public function setId($id)
  {
    $this->id = $id;
  }

  public function setPseudo($pseudo)
  {
    $this->pseudo = $pseudo;
  }

  public function setPassword($password)
  {
    $this->password = $password;
  }

  public function setEmail($email)
  {
    $this->email = $email;
  }

  public function setInscriptionDate($date)
  {
    $this->inscriptionDate = $date;
  }

  // Getters

  public function getId() {
    return $this->id;
  }

  public function getPseudo() {
    return $this->pseudo;
  }

  public function getPassword() {
    return $this->password;
  }

  public function getEmail() {
    return $this->email;
  }

  public function getInscriptionDate() {
    return $this->inscriptionDate;
  }

  function __construct(array $donnees)
  {
      $this->hydrate($donnees);
  }



}

 ?>
