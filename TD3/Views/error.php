<?php
  $titre = "Erreur";
  ob_start();
  echo "<p id='erreur'>Une erreur est survenue : ".$erreur.'</p>';
  $contenu = ob_get_clean();
  require("Views/menu.php");
  require("Views/layout.php");
 ?>
