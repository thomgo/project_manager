<?php

$pageTitle = "Une page de test";
$pageDescription = "Vous voilà sur le première page du framework";

include "header.php";

?>

<p>
  Testons pour voir si cette relations marchent
</p>

<?php

foreach ($data as $value) {
  echo  $value['name'] . " " . $value['age'];
}

echo "<p>" . $client['name'] . "<p>";

var_dump($row);

 ?>


<?php include "footer.php"; ?>
