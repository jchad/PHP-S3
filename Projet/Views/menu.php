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
/*  echo '<FORM id="search" action="index.php?action=search" method="post">
      <INPUT placeholder="Search user" name="searchuser">';
      if (isset($erreur)){
        echo "<p id='erreur2'>".$erreur.'</p>';
      }
    echo'<INPUT type="Submit" id="submit" value="Register">
    </FORM>';*/
  $menu = ob_get_clean();
 ?>
