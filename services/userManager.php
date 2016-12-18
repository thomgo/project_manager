<?php

// A class based and the data manager but dedicated to the management of the users

require_once "forms/Form.php";

class userManager extends dataManager {

// Start a new session based on a user object
  public function newSession($user) {
      $_SESSION['User'] = $user;
  }

  public function endSession() {
      $_SESSION= array();
      session_destroy();
  }

  public function pageName() {
    return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
  }

  public function inscriptionForm() {
    $form = new Form;
    $form->formStart($this->pageName());
      $form->textInput("pseudo", "Choisissez votre pseudo", "required");
      $form->passwordInput("password", "Indiquez un mot de passe", "required");
      $form->emailInput("email", "Votre email", "required");
      $form->submitButton("S'inscrire");
    $form->formEnd();

  }

  public function connexionForm() {
    $form = new Form;
    $form->formStart($this->pageName());
      $form->textInput("pseudo", "Votre pseudo", "required");
      $form->passwordInput("password", "Votre mot de passe", "required");
      $form->submitButton("Connexion");
    $form->formEnd();
  }

  // Add a user in the database
    public function addUser($user) {
      $error = "<h2>An error occured while your registration : </h2>";
      $errorDetection = false;
      $allUsers = $this->getAll("user");
      foreach ($allUsers as $key => $value) {
        foreach ($value as $key => $value) {
          switch ($value) {
            case $user['pseudo']:
              $error .= "<p>This pseudo is already used</p>";
              $errorDetection = true;
              break;
            case $user['email']:
              $error .= "<p>This email is already used</p>";
              $errorDetection = true;
              break;
          }
          if (password_verify($user['password'], $value)) {
            $error .= "<p>This password is already used</p>";
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

    // Connect the user if the user is registered in the database
    public function connectUser($user) {
      $error = "<h2>An error occured while your connexion : </h2>";
      if ($registeredUser = $this->getWhere("user", ["pseudo"=>$user['pseudo']])) {;
      foreach ($registeredUser as $key => $value) {
        if ($key === "password") {
          if (password_verify($user['password'], $value)) {
            $this->newSession($registeredUser);
          }
          else {
            $error .= "<p>Your password is not correct</p>";
            echo "<article class='errorMessage'>" . $error . "<article>";
          }
        }
      }
     }
     else {
       $error .= "<p>This pseudo is unknown</p>";
       echo "<article class='errorMessage'>" . $error . "<article>";
     }
    }

    // Function to hide the view if the user is not registered
    public function sessionAccessHide ($view) {
      if (empty($_SESSION)) {

        echo "<article class='errorMessage'><h2>This content is only for registered members</h2>";
        $this->connexionForm();
        echo "<article>";

        if (isset($_POST)) {
              $this->connectUser($_POST);
              header($this->pageName(), 'refresh');
          }
      }
      else {
            include $view;
        }

    }

    function __construct()
    {
        session_start();
    }

}

 ?>
