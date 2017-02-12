<?php
$pageTitle = "";
$pageDescription = "";

include "singleHeader.php";
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

     </section>

     </div>
   </div>

 <?php include "footer.php"; ?>
