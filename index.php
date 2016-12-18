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

// $test = $dataManager->getWhere("user", ["pseudo"=>"Nono"]);
// $user = new User($test);
// var_dump($user);

// $userManager->newSession($user);
// $userManager->inscriptionForm();
// $userManager->connexionForm();


// if (isset($_POST)) {
//       $userManager->connectUser($_POST);
//       header('index.php', 'refresh');
//   }

// $userManager->endSession();
$userManager->sessionAccessHide("view/indexView.php");

// include "view/indexView.php";

?>
