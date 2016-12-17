<?php

// A class based and the data manager but dedicated to the management of the users

require_once "forms/Form.php";

class userManager extends dataManager {

// Start a new session based on a user object
  public function newSession($user) {
      session_start();
      $_SESSION['User'] = $user;
  }

  public function endSession() {
      $_SESSION= array();
      session_destroy();
  }

  public function pageName() {
    return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
  }

  public function inscription() {
    $form = new Form;
    $form->formStart($this->pageName());
      $form->textInput("pseudo", "Choisissez votre pseudo", "required");
      $form->passwordInput("password", "Indiquez un mot de passe", "required");
      $form->emailInput("email", "Votre email", "required");
      $form->submitButton("S'inscrire");
    $form->formEnd();

  }

  public function connexion() {
    $form = new Form;
    $form->formStart($this->pageName());
      $form->textInput("pseudo", "Votre pseudo", "required");
      $form->passwordInput("password", "Votre mot de passe", "required");
      $form->submitButton("Connexion");
    $form->formEnd();
  }

  // Add a user in the database
    public function addUser($user) {
      $error = "An error occured while your registration : ";
      $errorDetection = false;
      $allUsers = $this->getAll("user");
      foreach ($allUsers as $key => $value) {
        foreach ($value as $key => $value) {
          switch ($value) {
            case $user['pseudo']:
              $error .= "This pseudo is already used";
              $errorDetection = true;
              break;
            case $user['email']:
              $error .= "This email is already used";
              $errorDetection = true;
              break;
          }
          if (password_verify($user['password'], $value)) {
            $error .= "This password is already used";
            $errorDetection = true;
          }
        }
      }
      if (!$errorDetection) {
        $form = new Form;
        $user = $form->validateForm($user);
          if (gettype($user === "array")) {
            $this->insertInto("user", $user);
          }
          else {
            echo "<article class='errorMessage'>" . $user . "<article>";
          }
      }
      else {
        echo "<article class='errorMessage'>" . $error . "<article>";
      }
    }

}

 ?>
