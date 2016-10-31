<?php
  $titre = "Détails acteur";
  ob_start();
    echo '<h1>Détail de l\'acteur : '.$nomacteur.'</h1>' ;
    echo '<p>Cet acteur est présent dans '.$count. ' films.</p>';
    echo '<table><tr><th>Ordinal</th><th>Titre</th><th>Année</th>';
  foreach($listefilmsacteur as $ligne)
    echo '<tr><td>'.$ligne['Ordinal'].'</td><td><a href=index.php?movieid='.$ligne['MovieID'].'>'.$ligne['Titre'].'</a><td>'.$ligne['Année'].'</td></td>';
  echo '</table>';
  $contenu = ob_get_clean();
  require("Views/menu.php");
  require("Views/layout.php");
 ?>
