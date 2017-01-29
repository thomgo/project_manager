<?php

$pageTitle = "Les projets";
$pageDescription = "Vous pouvez gérer tous vos projets sur cette page";

include "header.php";
include "menu.php";
?>


<?php

foreach ($projectList as $key => $value) {
  $project = new Liste($value);
  echo $project->getName();
}

$form->formStart("project.php");
$form->textInput("name","Votre projet", "required");
$form->submitButton("Ajouter un projet");
$form->formEnd();

 ?>

<?php include "footer.php"; ?>
