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
$form->maxFileSize("104");
$form->fileInput("file", "Votre fichier", "required");
$form->submitButton("fichier", "send");
$form->formEnd();
 ?>

  <?php
  // if (isset($_POST)) {
  //   var_dump($_FILES);
  //   echo $_FILES['file']['name'];
  //   echo $_FILES['file']['type'];
  // }
  $fileManager->img($image);
  // $fileManager->setSample("assets/img/sample/");
  var_dump($fileManager);

   ?>



<?php include "footer.php"; ?>
