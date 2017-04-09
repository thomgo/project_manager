// Style the format of the calendar in the date input

$(function() {
$( "input[type='date']" ).datepicker({
altField: "#datepicker",
closeText: 'Fermer',
prevText: 'Précédent',
nextText: 'Suivant',
currentText: 'Aujourd\'hui',
monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
monthNamesShort: ['Janv.', 'Févr.', 'Mars', 'Avril', 'Mai', 'Juin', 'Juil.', 'Août', 'Sept.', 'Oct.', 'Nov.', 'Déc.'],
dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
dayNamesShort: ['Dim.', 'Lun.', 'Mar.', 'Mer.', 'Jeu.', 'Ven.', 'Sam.'],
dayNamesMin: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
weekHeader: 'Sem.',
dateFormat: 'yy-mm-dd'
});
});

// Get the current date
var currentDate = new Date();
currentDate = currentDate.getTime();

// Date calculation to display the appropriate classe in the project head
$(".dueDate").each(function() {
  // get the date from the HTML and turn in js format with /
  var dueDate = $(this).text();
  var dateStore = dueDate.split("-");
  dateStore.unshift(dateStore[1]);
  dateStore.splice(2, 1);
  dueDate = dateStore.join("/");

  // Create new date and get the number of ms
  dueDate = new Date(dueDate);
  dueDate = dueDate.getTime();

  var timeLeft = ((dueDate - currentDate)/(1000*60*60*24)) + 1;
  var dayLeft = Math.round(timeLeft);

  if (dayLeft <= 0 ) {
      $(this).append(" |  date de rendu atteinte");
  }
  else {
      $(this).append(" | " + dayLeft + " jours restants");
  }

// Change the card header color according to the number of days left
  if (dayLeft <= 7) {
    $(this).parent().addClass("bg-danger text-white");
  }
  else if (dayLeft > 7 && dayLeft <= 30) {
    $(this).parent().addClass("bg-warning text-white");
  }
  else {
    $(this).parent().addClass("bg-success text-white");
  }
});


// Ajax request to update the action status
var xmlhttp = new XMLHttpRequest();

// On click get the name of the action and start the ajax request

function ajaxDone(name, currentButton) {
  xmlhttp.open("GET", "ajax.php?actionDone=" + name, true);

  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          currentButton.removeClass("btn-danger").addClass("btn-success");
          currentButton.removeClass("ajaxDone").addClass("ajaxToDo");
          currentButton.text("Validé");
          currentButton.parent().addClass("done");
      }
  };
  xmlhttp.send();
}



function ajaxToDo(name, currentButton) {
  xmlhttp.open("GET", "ajax.php?actionToDo=" + name, true);

  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          currentButton.removeClass("btn-success").addClass("btn-danger");
          currentButton.removeClass("ajaxToDo").addClass("ajaxDone");
          currentButton.text("A faire");
          currentButton.parent().removeClass("done");
      }
  };
  xmlhttp.send();
}

$(".ajax").click(function(){
  var name = $(this).parent(".list-group-item").clone().children().remove().end().text();
  var currentButton = $(this);
  if ($(this).hasClass("ajaxDone")) {
    ajaxDone(name, currentButton);
  }
  else {
    ajaxToDo(name, currentButton);
  }
});
