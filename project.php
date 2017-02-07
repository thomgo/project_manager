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

$projectList = $dataManager->getWhere("list", ["status"=>"0"], ["order"=>"dueDate"]);

if (isset($_POST["name"])) {
  $dataManager->insertInto("list", $_POST);
  header("Refresh:0");
}

if (isset($_POST["archiveProject"])) {
  $dataManager->updateTable("list", ["status"=>1, "id"=>$_POST["archiveProject"]]);
  header("Refresh:0");
}

// Include the view
include "view/projectView.php";

?>
