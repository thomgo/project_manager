<?php

require_once "model/dataManager.php";

$dataManager = new dataManager;

$data = $dataManager->getAll();

include "view/indexView.php";

?>
