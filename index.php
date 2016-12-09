<?php

require_once "model/dataManager.php";
require_once "forms/form.php";
require_once "Entities/Project.php";

$dataManager = new dataManager;

// $data = $dataManager->getAll("client");
//
// $row = $dataManager->getByRow(['name', "age", 'id'], "client");
//
$test = $dataManager->getWhere("projects", ["title"=>"test"]);
//
// $dataManager->insertInto("projects", ["title"=>"jijiji", "text"=>"jojojo"]);

// $dataManager->updateTable("projects", ["client_id"=>1, "title"=>"riri", "text"=>"jojojo"]);

$project = new Project($test);


$form = new form;

if (isset($_POST['firstname'])) {
  echo "string2";
}

include "view/indexView.php";

?>
