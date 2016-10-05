<?php
  $titre = "Erreur";
  ob_start();
  echo "<p id='erreur'>Une erreur est survenue : ".$erreur.'</p>';
  $contenu = ob_get_clean();
  require_once("Views/menu.php");
  require_once("Views/layout.php");
 ?>
