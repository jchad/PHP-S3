<?php
  $titre = "Détails du film";
  ob_start();
  echo '<h1>Détail du film : '.$results2['Titre'].'</h1>' ;
  echo '<h2>Informations sur le film</h2>';
  echo '<ul><li>année de tournage : ' .$results2['Année']. '</li>
  <li> score du film : ' .$results2['Score']. '</li>
  <li> nombre de votes : ' .$results2['Votes']. '</li></ul>';
  echo '<h2>Casting du film :</h2>';
  echo '<table><tr><th></th><th>Nom</th>';
  foreach($results3 as $ligne)
    echo '<tr><td>'.$ligne['Ordinal'].'</td><td>'.$ligne['Nom'].'</td>';
  echo '</table>';
  $contenu = ob_get_clean();
  require("Views/menu.php");
  require("Views/layout.php");
 ?>
