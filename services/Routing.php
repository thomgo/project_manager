<?php

class Routing {

  public function currentPage() {
    return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
  }

  public function redirection($pageName) {
    if ($pageName == "test") {
      header('controller/index.php');
    }
  }
}

 ?>
