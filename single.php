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

$project = $dataManager->getOneWhere("list", ["id"=>$_GET["id"]]);
$project = new Liste($project);

$stepList = $dataManager->getWhere("step", ["projectId"=>$_GET["id"]]);

if (isset($_POST["projectId"])) {
  $dataManager->insertInto("step", $_POST);
  header("Refresh:0");
}

if (isset($_POST["stepId"])) {
  $dataManager->insertInto("action", $_POST);
  header("Refresh:0");
}

// Include the view
include "view/singleView.php";

 ?>
