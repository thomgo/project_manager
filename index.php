<?php

// Autoloader
require_once "services/Autoloader.php";
Autoloader::register();

$dataManager = new dataManager;
$userManager = new userManager;
$form = new Form;
$fileManager = new fileManager;

$file = $dataManager->getWhere("sample", ["name"=>"background.jpg"]);
$image = new File($file);

$data = $dataManager->simpleJoin(["client"=>"id", "projects"=>"client_id"]);
// foreach ($data as $key => $projects) {
//   $project = new Project($projects);
//   echo $project->getTitle();
// }
// foreach ($data as $key => $value) {
//   echo "<p>Le client " . $value['name'] . " est acteur du projet " . $value['title'] . "</p>";
// }

// $userManager->newSession($user);
// $userManager->registrationForm();
// $userManager->connexionForm();
// var_dump($_SESSION);
//
// $userManager->logButton("index.php");

if (!empty($_POST)) {
  if (!empty($_FILES)) {
    $fileManager->fileRegister();
  }
  $dataManager->insertInto("client", $_POST);
}


include "view/indexView.php";

?>
