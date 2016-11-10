<?php
  $titre = "Ajouter :";
  ob_start();
  echo '<a href="admin.php?add=film">Un film</a>';
  echo '<a href="admin.php?add=acteur">Un acteur</a>';
  $contenu = ob_get_clean();
  require("../Views/menu.php");
  require("../Views/layout.php");
 ?>
