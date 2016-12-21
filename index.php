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


$user = $userManager->specificUser(["pseudo"=>"Nono"]);
var_dump($user);
// $userManager->newSession($user);
$userManager->registrationForm();
// $userManager->connexionForm();
// var_dump($_SESSION);
//
// $userManager->logButton("index.php");

// if (isset($_POST)) {
//   var_dump($_POST);
//       // $userManager->addUser($_POST);
//       // header('index.php', 'refresh');
//   }

// $monUrl = $_SERVER['REQUEST_URI'];
// echo $monUrl;


include "view/indexView.php";

?>
