<?php

// A class based and the data manager but dedicated to the management of the users

require_once "forms/Form.php";

class userManager extends dataManager {

// Add a user in the database
  public function addUser($user) {
    $this->insertInto("user", $user);
  }

// Start a new session based on a user object
  public function newSession($user) {
      session_start();
      $_SESSION['User'] = $user;
  }

  public function endSession() {
      $_SESSION= array();
      session_destroy();
  }
  public function inscription() {
    $form = new Form;
    $form->formStart("index.php");
      $form->textInput("pseudo", "Choisissez votre pseudo", "required");
      $form->passwordInput("password", "Indiquez un mot de passe", "required");
      $form->emailInput("email", "Votre email", "required");
      $form->submitButton("S'inscrire");
    $form->formEnd();

  }

  public function connexion() {
    $form = new Form;
    $form->formStart("index.php");
      $form->textInput("pseudo", "Votre pseudo", "required");
      $form->passwordInput("password", "Votre mot de passe", "required");
      $form->submitButton("Connexion");
    $form->formEnd();
  }

}

 ?>
