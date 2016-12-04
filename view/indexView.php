<?php

$pageTitle = "Une page de test";
$pageDescription = "Vous voilà sur le première page du framework";

include "header.php";

?>

<p>
  Testons pour voir si cette relations marchent
</p>

<?php

foreach ($data as $value) {
  echo  $value['name'] . " " . $value['age'];
}

echo "<p>" . $client['name'] . "<p>";

var_dump($test);

foreach ($test as $client) {
  echo $client['name'] . " " . $client['age'];
}


$form->formStart("index.php", "classtest");
  $form->textInput("textee", "votre text", "required");
  $form->numberInput("numb", "votre nombre");
  $form->passwordInput("pass", "votre pass", "required");
  $form->radioInput("rad", "les radios", ["choix1", "choix2", "choix7"]);
  $form->checkboxInput("sports", "Vos sports", ["foot", "basket", "tennis"]);
  $form->fileInput("fil", "votre fichier", "required");
  $form->emailInput("numb", "votre email", 'Required');
  $form->textArea("area", "votre message", 'Required');
  $form->selectField("selec", "Votre choix", ["choix1", "choix2", "choix3"]);
  $form->colorInput("col", "choisissez votre couleur");
  $form->submitButton("vendre");
$form->formEnd();

 ?>


<?php include "footer.php"; ?>
