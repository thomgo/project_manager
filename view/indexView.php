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
$form->maxFileSize("2000000");
$form->fileInput("file/sample", "Votre fichier", "required");
$form->submitButton("fichier", "send");
$form->formEnd();
 ?>

  <?php
  $fileManager->img($image);
   ?>



<?php include "footer.php"; ?>
