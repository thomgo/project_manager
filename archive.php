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

$projectList = $dataManager->getWhere("list", ["status"=>"1"]);

if (isset($_POST["deleteProject"])) {
  $dataManager->deleteWhere("list", ["id"=>$_POST["deleteProject"]]);
  header("Refresh:0");
}

if (isset($_POST["deleteAll"])) {
  $dataManager->deleteWhere("list", ["status"=>1]);
  header("Refresh:0");
}

// Include the view
include "view/archiveView.php";

?>
