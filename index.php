<?php

// Autoloader
require_once "services/Autoloader.php";
Autoloader::register();

$dataManager = new dataManager;

$data = $dataManager->getAll("projects");
//
// $row = $dataManager->getByRow(['name', "age", 'id'], "client");
//
$test = $dataManager->getWhere("projects", ["title"=>"riri"]);
//
// $dataManager->insertInto("projects", ["title"=>"jijiji", "text"=>"jojojo"]);

// $dataManager->updateTable("projects", ["client_id"=>1, "title"=>"riri", "text"=>"jojojo"]);

$project = new Project($test);


$form = new Form;


if (isset($_POST)) {
  $_POST = $form->validateForm($_POST);
    if (gettype($_POST === "array")) {
      $dataManager->insertInto("projects", $_POST);
      header('index.php', 'refresh');
    }
    else {
      echo $_POST;
    }

  }
include "view/indexView.php";

?>
