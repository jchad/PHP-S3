<?php
  ob_start();
  echo '<nav><a href="./index.php">Accueil</a>';
  if (isset($_SESSION['login'])){
      echo '<a href="./index.php?action=logout">Deconnexion</a></nav>';
  }
  else{
    echo '<a href="./index.php?action=connection">Connexion</a></nav>';
  }
  $menu = ob_get_clean();
 ?>
