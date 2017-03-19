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
      <div class="row">
      <?php
        // Message if the loop is empty
        if (empty($stepList)) {
          echo "<p>Vous n'avez aucune étape d'enregistrée pour l'instant</p>";
        }
        // Otherwise foreach the list of steps and display them in cards
        else {
        foreach ($stepList as $step) {
        ?>
        <div class="col-xs-12 col-md-6">
          <article class="card" style="width: 25rem;">
             <div class="card-block">
               <h4 class="card-title"><?php echo $step->getName(); ?></h4>
               Deadline fixée au : <?php echo "<span class='dueDate'>" . $step->getDueDate() . "</span>"; ?>
             </div>
             <div class="card-block">
               <p class="card-text"><?php echo $step->getDescription(); ?></p>
             </div>
             <ul class="list-group list-group-flush">
               <li class="list-group-item">Cras justo odio</li>
               <li class="list-group-item">Dapibus ac facilisis in</li>
               <li class="list-group-item">Vestibulum at eros</li>
             </ul>
             <div class="card-block">
               <?php
               $form->formStart("single.php?id=" . $project->getId() . "&name=" . $project->getName());
               $form->hiddenInput("stepId", $step->getId());
               $form->textInput("name","", "required");
               $form->submitButton("Ajouter");
               $form->formEnd();
                ?>
             </div>
           </article>
       </div>
        <?php
        }
      }
       ?>
     </div>

   </section>

     </div>
   </div>

 <?php include "footer.php"; ?>
