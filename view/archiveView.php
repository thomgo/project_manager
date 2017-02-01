<?php

$pageTitle = "Archives";
$pageDescription = "Voyez en un coup d'oeil tous les projest que vous avez terminés";

include "header.php";
include "menu.php";
?>

<div class="container">
  <div class="row">

<!-- Aside with the form to add a project -->
    <aside class="col-xs-12 col-md-3">
      <?php
      $form->formStart("project.php");
      $form->textInput("name","Votre projet", "required");
      $form->textArea("description","Description de votre projet", "required");
      $form->dateInput("dueDate", "Date de rendu", "required");
      $form->submitButton("Ajouter un projet");
      $form->formEnd();
       ?>
    </aside>

<!-- Main section containing the project list -->
    <section class="col-xs-12 col-md-9">
      <!-- Loop start to display each project in a card -->
      <?php
      if (empty($projectList)) {
        echo "<p>Vous n'avez aucun projet d'archivé pour l'instant</p>";
      }
      else {
      foreach ($projectList as $value) {
        $project = new Liste($value);
        ?>
        <article class="card">
          <div class="card-header">
            Deadline fixée au : <?php echo date($project->getDueDate()); ?>

            <!-- Form to send the project to the archive -->
            <?php
            $form->formStart("archive.php");
            $form->hiddenInput("deleteProject", $project->getId());
            $form->submitButton("Supprimer");
            $form->formEnd();
             ?>

          </div>
          <div class="card-block">
            <h4 class="card-title"><?php echo $project->getName(); ?></h4>
            <p class="card-text"><?php echo $project->getDescription() ?></p>
            <a href="#" class="btn btn-success">Voir</a>
          </div>
        </article>
        <?php
        }
      }
       ?>
    </section>

    </div>
  </div>

<?php include "footer.php"; ?>
