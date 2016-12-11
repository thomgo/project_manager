<?php

$pageTitle = "Une page de test";
$pageDescription = "Vous voilà sur le première page du framework";

include "header.php";

?>

<p>
  Testons pour voir si cette relations marchent
</p>

<?php
foreach ($data as $proj) {
  $project = new Project($proj);
  echo $project->getTitle();
}

echo "The current page name is ".curPageName();


$form->formStart("index.php", "classtest");
  $form->textInput("title", "le titre", "required");
  $form->textArea("text", "le texte", "required");
  $form->numberInput("client_id", "votre id", "required");
  $form->submitButton("Envoyer");
$form->formEnd();

 ?>


<?php include "footer.php"; ?>
