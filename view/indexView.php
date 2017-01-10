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
   ?>



<?php include "footer.php"; ?>
