<?php

// Autoloader
require_once "services/Autoloader.php";
Autoloader::register();

$dataManager = new dataManager;
$userManager = new userManager;
$form = new Form;

$data = $dataManager->getAll("projects");


$test = $dataManager->getWhere("user", ["pseudo"=>"Nono"]);
$user = new User($test);

$userManager->newSession($user);
$userManager->inscription();
// $userManager->connexion();

if (isset($_POST)) {
      $userManager->addUser($_POST);
      header('index.php', 'refresh');
  }

include "view/indexView.php";

?>
