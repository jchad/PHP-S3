<?php
  $titre = "Détails du film";
  ob_start();
  echo '<h1>Détail du film : '.$data['Titre'].'</h1>' ;
  echo '<h2>Informations sur le film</h2>';
  echo '<ul><li>année de tournage : ' .$data['Année']. '</li>
  <li> score du film : ' .$data['Score']. '</li>
  <li> nombre de votes : ' .$data['Votes']. '</li></ul>';
  echo '<h2>Casting du film :</h2>';
  echo '<table><tr><th></th><th>Nom</th>';
  foreach($data2 as $ligne)
    echo '<tr><td>'.$ligne['Ordinal'].'</td><td>'.$ligne['Nom'].'</td><tr>';
  echo '</table>';
  $contenu = ob_get_clean();
  require("Views/layout.php");
 ?>
