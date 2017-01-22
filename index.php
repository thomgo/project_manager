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

$data = $dataManager->simpleJoin(["client"=>"id", "sample"=>"client_id"]);
// var_dump($data);
// $client = new Client($data[0]);
// echo $client->getId();
// $img = new File($data[0]);
// echo $img->getName();

// foreach ($data as $key => $projects) {
//   $project = new Project($projects);
//   $client = new Client($project);
//   echo "<p>" . $project->getTitle() . "</p>";
//   echo "<p>" . $client->getName() . "</p>";
//
// }

// foreach ($data as $key => $value) {
//   $client = new Client($data[$key]);
//   $img = new File($data[$key]);
//   echo "<p>" . $client->getFirstname() . " " . $img->getName() . "</p>";
// }

// $userManager->newSession($user);
// $userManager->registrationForm();
// $userManager->connexionForm();
// var_dump($_SESSION);
//
// $userManager->logButton("index.php");

if (!empty($_POST)) {
  if (!empty($_FILES)) {
  if ( $fileManager->fileRegister() || $dataManager->insertInto("client", $_POST)) {
    $fileManager->binTables("client", "sample", "client_id");
  }
 }
}

include "view/indexView.php";

?>
