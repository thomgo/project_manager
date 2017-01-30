<?php

$pageTitle = "Les projets";
$pageDescription = "Vous pouvez gérer tous vos projets sur cette page";

include "header.php";
include "menu.php";
?>

<div class="container">
  <div class="row">

    <div class="col-xs-12 col-md-3">
      <?php
      $form->formStart("project.php");
      $form->textInput("name","Votre projet", "required");
      $form->submitButton("Ajouter un projet");
      $form->formEnd();
       ?>
    </div>

    <div class="col-xs-12 col-md-9">
      <?php
      foreach ($projectList as $value) {
        $project = new Liste($value);
        ?>
        <div class="card">
          <div class="card-header">
            Deadline fixée au :
            <?php
            $form->formStart("project.php");
            $form->hiddenInput("deleteProject", $project->getId());
            $form->submitButton("Supprimer");
            $form->formEnd();
             ?>
          </div>
          <div class="card-block">
            <h4 class="card-title"><?php echo $project->getName(); ?></h4>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-success">Voir</a>
          </div>
        </div>
        <?php
        }
       ?>
    </div>

    </div>
  </div>

<?php include "footer.php"; ?>
