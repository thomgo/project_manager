<?php

// A class based and the data manager but dedicated to the management of the users

require_once "forms/Form.php";

class userManager extends dataManager {

// Start a new session based on a user $_POST variable
  public function newSession($user) {
      $_SESSION['User'] = $user;
  }

// Empty the current session
  public function endSession() {
      $_SESSION= array();
      session_destroy();
  }



  //
  //~~~~~~~~~ Function to get the current page name and set the forms action  ~~~~~~~~~~~
  //
  //

  private function pageName() {
    return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
  }



  //
  //~~~~~~~~~ Function to display a registration form based on the user entity  ~~~~~~~~~~~
  //
  //

  public function registrationForm() {
    $form = new Form;
    $form->formStart($this->pageName());
      $form->textInput("pseudo", "Choisissez votre pseudo", "required");
      $form->passwordInput("password", "Indiquez un mot de passe", "required");
      $form->emailInput("email", "Votre email", "required");
      $form->submitButton("registration", "S'inscrire");
    $form->formEnd();

  }



  //
  //~~~~~~~~~ Function to display a connexion form based on the user entity  ~~~~~~~~~~~
  //
  //

  public function connexionForm() {
    $form = new Form;
    $form->formStart($this->pageName());
      $form->textInput("pseudo", "Votre pseudo", "required");
      $form->passwordInput("password", "Votre mot de passe", "required");
      $form->submitButton("connexion", "Connexion");
    $form->formEnd();
  }



  //
  //~~~~~~~~~  Add a user in the database  ~~~~~~~~~~~
  // $user is global $_POST variable from an registration form
  //

    public function addUser($user) {
      // Start an error message in case the registration fails
      $error = "<h2>An error occured while your registration : </h2>";
      $errorDetection = false;

      // Get all the registered users
      // Check for each of them if they have the same pseudo, email or password than the submitted one
      // If so then it adds the right message to the global error message
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
      // If errordetection still to false there is no conflict and we can register the user
      if (!$errorDetection) {
        $this->insertInto("user", $user);
      }
      // If error has been detected then shows the global error message
      else {
        echo "<article class='errorMessage'>" . $error . "<article>";
      }
    }



    //
    //~~~~~~~~~  Connect the user if the user is registered in the database  ~~~~~~~~~~~
    // $user is global $_POST variable from a connexion form
    //

    public function connectUser($user) {
      // Start an error message in case the connexion fails
      $error = "<h2>An error occured while your connexion : </h2>";

      // Get the user with same pseudo than the submitted one
      if ($registeredUser = $this->getWhere("user", ["pseudo"=>$user['pseudo']])) {
      foreach ($registeredUser as $key => $value) {
        // Check if the submitted password is the same then the one in the database
        if ($key === "password") {
          if (password_verify($user['password'], $value)) {
            $this->newSession($registeredUser);
          }
          // If the password is wrong echo an error message
          else {
            $error .= "<p>Your password is not correct</p>";
            echo "<article class='errorMessage'>" . $error . "<article>";
          }
        }
      }
     }
    //  If no user matches the pseudo then echo a error message
     else {
       $error .= "<p>This pseudo is unknown</p>";
       echo "<article class='errorMessage'>" . $error . "<article>";
     }
    }





    //
    //~~~~~~~~~  A function to get all the users at once in an array  ~~~~~~~~~~~
    //
    //

    public function allUsers() {
      return $this->getAll("user");
    }




    //
    //~~~~~~~~~  A function to get a specific user with case sensitive request  ~~~~~~~~~~~
    //
    //

    public function specificUser($assoArray) {
      return $this->getWhere("user", $assoArray);
    }





    //
    //~~~~~~~~~  A function to display a logout button  ~~~~~~~~~~~
    //
    //

    public function logButton($connexionPage) {
      $form = new form;
      $form->formStart($this->pageName());
      if (!empty($_SESSION)) {
        $form->submitButton("logout", "Logout");
      }
      else {
        $form->submitButton("connexion", "Connexion");
      }
      $form->formEnd();

      if (isset($_POST['logout'])) {
        $this->endSession();
        header($this->pageName(), 'refresh');
      }

      if (isset($_POST['connexion'])) {
        header("Location: $connexionPage");
      }
    }



    //
    //~~~~~~~~~  Function to hide the view if the user is not registered  ~~~~~~~~~~~
    // $view is the path to your view as a string
    //

    public function sessionAccessHide ($view) {
      // Check first if there are session variables
      if (empty($_SESSION)) {
        // If not show a connexion form
        echo "<article class='errorMessage'><h2>This content is only for registered members</h2>";
        $this->connexionForm();
        echo "<article>";
        // If the form get data then try to connect the user and refresh the page to show the view
        if (isset($_POST)) {
              $this->connectUser($_POST);
              header($this->pageName(), 'refresh');
          }
      }
      // If the session has valid variables then it shows the view
      else {
            include $view;
        }

    }

    // Function that reidrects the user to an other page he is not connected
    // $yourPage is the aboslute path to the redirection page as a string

    public function sessionRedirection ($yourPage) {
      if (empty($_SESSION)) {
        header("Location: $yourPage");
      }
    }



    //
    //~~~~~~~~~  When a new data manager is started a session is created  ~~~~~~~~~~~
    //

    function __construct()
    {
        session_start();
    }

}

 ?>
