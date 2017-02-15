<?php

$pageTitle = "Archives";
$pageDescription = "Voyez en un coup d'oeil tous les projets que vous avez terminés";

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

      // Form to delete all the projects
      $form->formStart("archive.php");
      $form->hiddenInput("deleteAll", "0");
      $form->submitButton("Toutsupprimer");
      $form->formEnd();

      // If no archived projects shows a message
      if (empty($projectList)) {
        echo "<p>Vous n'avez aucun projet d'archivé pour l'instant</p>";
      }
      // Otherwise foreach the archives projects list and show them in cards
      else {
      foreach ($projectList as $value) {
        $project = new Liste($value);
        ?>
        <article class="card">
          <div class="card-header">
            Deadline fixée au : <?php echo date($project->getDueDate()); ?>

            <!-- Form to delete the project -->
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
        // End of the loop
        }
      }
       ?>
    </section>

    </div>
  </div>

<?php include "footer.php"; ?>
