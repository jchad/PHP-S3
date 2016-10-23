<?php
  ob_start();
  echo '<nav><a href="index.php">Accueil</a>';
  if (isset($_SESSION['login'])){
    require("Model/ConnectionManager.php");
    $cm= new ConnectionManager();
    $userid = $cm->getUserID($_SESSION['login']);
    echo '<a href="index.php?action=logout">Deconnexion</a></nav>';
    echo '<em id="profil">Bienvenue, <a href="index.php?userid="'.$userid.'">'.$_SESSION['login'].'</a></em>';
  }
  else{
    echo "<a href='index.php?action=inscription'>S'inscrire</a>";
    echo '<a href="index.php?action=connection">Connexion</a></nav>';
  }

  $menu = ob_get_clean();
 ?>
