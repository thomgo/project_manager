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

foreach ($stepList as $key=>$value) {
  $stepList[$key] = new Step($value);
}

// Join test
// $test = $dataManager->simpleJoin(["step"=>"id", "action"=>"stepId"],"left" , ["S.projectId"=>57]);
// foreach ($test as $key => $value) {
//   echo "<p>" . var_dump($value) ."</p>";
// }


// Insert a new step in database
if (isset($_POST["projectId"])) {
  $dataManager->insertInto("step", $_POST);
  header("Refresh:0");
}

// Insert a new action in database
if (isset($_POST["stepId"])) {
  $dataManager->insertInto("action", $_POST);
  header("Refresh:0");
}

// Include the view
include "view/singleView.php";

 ?>
