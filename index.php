<?php

// Autoloader
require_once "services/Autoloader.php";
Autoloader::register();

$dataManager = new dataManager;
$userManager = new userManager;
$form = new Form;

$data = $dataManager->getAll("projects");
// foreach ($data as $key => $projects) {
//   $project = new Project($projects);
//   echo $project->getTitle();
// }


// $userManager->newSession($user);
$userManager->registrationForm();
// $userManager->connexionForm();
//
//
if (isset($_POST)) {
      $userManager->addUser($_POST);
      header('index.php', 'refresh');
  }


include "view/indexView.php";

?>
