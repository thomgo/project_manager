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

$projectList = $dataManager->getAll("list");

if (isset($_POST["name"])) {
  $dataManager->insertInto("list", $_POST);
}

// Include the view
include "view/projectView.php";

?>