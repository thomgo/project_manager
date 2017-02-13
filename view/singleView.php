<?php
$pageTitle = $project->getName();
$pageDescription = $project->getDescription();

include "singleHeader.php";
include "menu.php";
 ?>

 <div class="container">
   <div class="row">

 <!-- Aside with the form to add a step -->
     <aside class="col-xs-12 col-md-3">
       <?php
       $form->formStart("single.php?id=" . $project->getId() . "&name=" . $project->getName());
       $form->textInput("name","Etape du projet", "required");
       $form->textArea("description","Objectif de l'étape", "required");
       $form->dateInput("dueDate", "Date limite", "required");
       $form->hiddenInput("projectId", $project->getId());
       $form->submitButton("Ajouter");
       $form->formEnd();
        ?>
     </aside>

 <!-- Main section containing the project list -->
     <section class="col-xs-12 col-md-9">
      <?php

        foreach ($stepList as $value) {
          $step = new Step($value);
          echo $step->getName();
        }

       ?>
     </section>

     </div>
   </div>

 <?php include "footer.php"; ?>
