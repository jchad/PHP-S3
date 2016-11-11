<?php
  $titre = "Ajouter";
  ob_start();
  echo '<h1>Ajouter :</h1>';
  echo '<a class="admin" href="admin.php?add=film">Un film</a>';
  echo '<a class="admin" href="admin.php?add=acteur">Un acteur</a>';
  $contenu = ob_get_clean();
  require("Views/menu.php");
  require("../Views/layout.php");
 ?>
