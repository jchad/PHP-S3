<?php
  ob_start();
  echo '<nav><a href="./index.php">Accueil</a></nav>';
  echo '<nav><a href="./index.php?action=connection">Connexion</a></nav>';
  $menu = ob_get_clean();
 ?>
