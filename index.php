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
$userManager->connexion();

if (empty($_SESSION)) {
  echo "Il y a une session";
}


// if (isset($_POST)) {
//   $_POST = $form->validateForm($_POST);
//     if (gettype($_POST === "array")) {
//       $userManager->addUser($_POST);
//       header('index.php', 'refresh');
//     }
//     else {
//       echo $_POST;
//     }
//   }

include "view/indexView.php";

?>
