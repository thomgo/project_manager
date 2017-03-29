<?php

// Autoloader
require_once "services/Autoloader.php";
Autoloader::register();

// The different managers to deal with data, users and files
$dataManager = new dataManager;
$userManager = new userManager;
$form = new Form;
$fileManager = new fileManager;

// The code logic

if (isset($_GET["actionDone"])) {
  $dataManager->updateTable("action", ["status"=>"1", "name"=>$_GET["actionDone"]]);
}

if (isset($_GET["actionToDo"])) {
  $dataManager->updateTable("action", ["status"=>"0", "name"=>$_GET["actionToDo"]]);
  echo "<h1>". $_GET["actionToDo"] ."</h1>";
}

?>
