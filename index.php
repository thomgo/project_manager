<?php

require_once "model/dataManager.php";
require_once "forms/form.php";

$dataManager = new dataManager;

$data = $dataManager->getAll("client");

$client = $dataManager->getById(1);

$row = $dataManager->getByRow();

$form = new form;

if (isset($_POST['firstname'])) {
  echo "string2";
}

include "view/indexView.php";

?>
