<?php
  ob_start();
  echo '<h1>Profil de : '.$userinfo['Login'].'</h1>' ;
  echo "<ul><li>Nombre de film aimés : ".$userinfo['nbVotes']."</li>
  <li> Date d'inscription : ".$userinfo['DateInscription']."</li></ul>";
  if ($userinfo['nbVotes']!=0){
    echo '<h2>Films aimés :</h2>';
    echo '<table><tr><th>Titre</th>';
    foreach($voteuser as $ligne)
      echo '<tr><td>'.$ligne['Titre'].'</td>';
    echo '</table>';
  }
  $contenu = ob_get_clean();
  require("Views/menu.php");
  require("Views/layout.php");
 ?>
