<?php

$pageTitle = "Une page de test";
$pageDescription = "Vous voilà sur le première page du framework";

include "header.php";

?>

<p>
  Testons cette relations marchent
</p>

<?php
$form->formStart("index.php");
$form->textInput("name", "nom du client", "required");
$form->numberInput("age", "age du client");
$form->maxFileSize("2000000");
$form->fileInput("file/sample", "Votre fichier", "required", true);
$form->submitButton("envoyer");
$form->formEnd();
 ?>

  <?php
  $fileManager->img($image);
   ?>



<?php include "footer.php"; ?>
