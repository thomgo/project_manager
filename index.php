<?php

require_once "model/dataManager.php";

$dataManager = new dataManager;

$data = $dataManager->getAll();

$client = $dataManager->getById(1);

$row = $dataManager->getByRow();

$dataManager->deleteAll();

include "view/indexView.php";

?>
