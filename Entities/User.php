<?php

require_once "Hydrator.php";
/**
 *
 */
class User {

// Hydrating function
  use Hydrator;

  private $id;

  // I strongly recommand you make this attribute case sensitive in MySql setting its attribute to Binary
  private $pseudo;

  private $password;
  private $email;
  private $inscriptionDate;
  private $role;


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

  public function setRole($role)
  {
    $this->role = $role;
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

  public function getRole() {
    return $this->role;
  }

  function __construct(array $donnees)
  {
      $this->hydrate($donnees);
  }



}

 ?>
