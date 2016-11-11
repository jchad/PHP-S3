<?php
  $titre='Films de '.$_GET['annee'];
  ob_start();
  echo '<h1>Liste des films de '.$_GET['annee'].' :</h1>';
  echo '<table id="tablefilm"><tr><th>Titre</th>
  <th>Score</th>
  <th>Votes</th></tr>';
  foreach($filmsannee as $ligne)
    echo '<tr><td><a href="index.php?movieid='.$ligne['MovieID'].'">'.$ligne['Titre'].'</a></td><td>'.$ligne['Score'].'</td><td>'.$ligne['Votes'].'</td></tr>';
  echo '</table>';
  $contenu=ob_get_clean();
  require("Views/menu.php");
  require("Views/layout.php");
?>
