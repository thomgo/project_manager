<?php

$pageTitle = "Les projets";
$pageDescription = "Vous pouvez gérer tous vos projets sur cette page";

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
        echo "<p>Vous n'avez aucun projet d'enregistré pour l'instant</p>";
      }

      else {
      foreach ($projectList as $value) {
        $project = new Liste($value);
        ?>
        <article class="card">
          <div class="card-header">
            Deadline fixée au : <?php echo "<span>" . $project->getDueDate() . "</span>"; ?>

            <!-- Form to send the project to the archive -->
            <?php
            $form->formStart("project.php");
            $form->hiddenInput("archiveProject", $project->getId());
            $form->submitButton("Archiver");
            $form->formEnd();
             ?>

          </div>
          <div class="card-block">
            <h4 class="card-title"><?php echo $project->getName(); ?></h4>
            <p class="card-text"><?php echo $project->getDescription() ?></p>
            <a href="#" class="btn darkgreen-btn">Voir</a>
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
