<?php

// A class based and the data manager but dedicated to the management of the users

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
      $_SESSION = array();
      session_destroy();
  }
  public function inscription() {

  }

  public function connexion() {

  }

}

 ?>
