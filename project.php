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

// Get the five first unarchived projects
$projectList = $dataManager->getWhere("list", ["status"=>"0"], ["order"=>"dueDate", 0 => 5]);

// Add a new project to the list
if (isset($_POST["name"])) {
  $dataManager->insertInto("list", $_POST);
  header("Refresh:0");
}

// Change the status of a projetc to archived (1) so that it takes it out of the loop
if (isset($_POST["archiveProject"])) {
  $dataManager->updateTable("list", ["status"=>1, "id"=>$_POST["archiveProject"]]);
  header("Refresh:0");
}

// Include the view
include "view/projectView.php";

?>
