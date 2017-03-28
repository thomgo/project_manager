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

if (isset($_GET["action"])) {
  $dataManager->updateTable("action", ["status"=>1, "name"=>$_GET["action"]]);
}
?>
