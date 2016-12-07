<?php

require_once "model/dataManager.php";
require_once "forms/form.php";

$dataManager = new dataManager;

$data = $dataManager->getAll("client");

$row = $dataManager->getByRow(['name', "age", 'id'], "client");

$test = $dataManager->getWhere("client", ["age"=>32]);

$dataManager->deleteWhere("client", ["name"=>"jean"]);


$form = new form;

if (isset($_POST['firstname'])) {
  echo "string2";
}

include "view/indexView.php";

?>
