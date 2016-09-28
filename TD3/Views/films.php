<?php
  $titre="Liste des films";
  ob_start();
  echo '<h1>Liste des films</h1>';
  echo '<p>'.$count. ' film(s) trouvé(s) dans la base de données</p>';
  echo '<table><tr><th>Titre</th><th>Année</th><th>Score</th><th>Votes</th><th></th></tr>';
  foreach($results as $ligne)
    echo '<tr><td>'.$ligne['Titre'].'</td><td>'.$ligne['Année'].'</td><td>'.$ligne['Score'].'</td><td>'.$ligne['Votes'].'</td><td><a href="http://localhost/php/PHP-S3/TD3/index.php?movieid='.$ligne['MovieID'].'">détails</a></td></tr>';
  echo '</table>';
  $contenu=ob_get_clean();
  require("Views/menu.php");
  require("Views/layout.php");
?>
