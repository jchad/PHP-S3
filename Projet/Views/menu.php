<?php
  ob_start();
  echo '<nav><a href="index.php">Accueil</a>';
  echo '<a href="admin/admin.php">Administration</a>';
  if (isset($_SESSION['login'])){
    $userid = $um->getUserID($_SESSION['login']);
    echo '<a href="index.php?action=logout">Deconnexion</a>';
    echo '<em id="profil">Bienvenue, <a href="index.php?userid='.$userid.'">'.$_SESSION['login'].'</a></em>';
  }
  else{
    echo "<a href='index.php?action=inscription'>S'inscrire</a>";
    echo '<a href="index.php?action=connection">Connexion</a>';
  }
  echo '<FORM id="search" action="index.php?action=search" method="post">
      <INPUT placeholder="Search user" name="searchuser">
      <INPUT type="Submit" class="submit" value="Search">
    </FORM></nav>';
  $menu = ob_get_clean();
 ?>
