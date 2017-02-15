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

// Get all the project of the list that are archived
$projectList = $dataManager->getWhere("list", ["status"=>"1"]);

// Delete a project
if (isset($_POST["deleteProject"])) {
  $dataManager->deleteWhere("list", ["id"=>$_POST["deleteProject"]]);
  header("Refresh:0");
}

// Delete all the projects
if (isset($_POST["deleteAll"])) {
  $dataManager->deleteWhere("list", ["status"=>1]);
  header("Refresh:0");
}

// Include the view
include "view/archiveView.php";

?>
