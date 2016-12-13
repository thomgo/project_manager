<?php

$pageTitle = "Une page de test";
$pageDescription = "Vous voilà sur le première page du framework";

include "header.php";

?>

<p>
  Testons cette relations marchent
</p>

<?php

$form->formStart("index.php", "classtest");
  $form->textInput("pseudo", "Votre pseudo", "required");
  $form->passwordInput("password", "votre mot de passe", "required");
  $form->emailInput("email", "Votre email", "required");
  $form->submitButton("Envoyer");
$form->formEnd();

 ?>



<?php include "footer.php"; ?>
