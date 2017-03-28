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
function ajaxActionUpdate(a) {
  var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "ajax.php?action=" + a, true);
        xmlhttp.send();
    }

// On click get the name of the action and start the ajax request
$(".ajaxDone").click(function() {
  var name = $(this).parent(".list-group-item").clone().children().remove().end().text();
  ajaxActionUpdate(name);
});
