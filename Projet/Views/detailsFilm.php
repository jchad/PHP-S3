<?php
  $titre = "Détails du film";
  ob_start();
  echo '<h1>Détail du film : '.$results2['Titre'].'</h1>' ;
  echo '<h2>Informations sur le film</h2>';
  echo '<ul><li>année de tournage : ' .$results2['Année']. '</li>
  <li> score du film : ' .$results2['Score']. '</li>
  <li> nombre de votes : ' .$results2['Votes']. '</li></ul>';
  if (isset($_SESSION['login'])){
    if($results5==0){
      echo '<FORM action="index.php?movieid='.$movieid.'&amp;action=vote" method="post"><p><INPUT class="submit" type="submit" value="Votez pour ce film"></p></FORM>';
    }
    else{
      echo '<FORM action="index.php?movieid='.$movieid.'&amp;action=unvote" method="post"><p><INPUT class="submit" type="submit" value="Retirer mon vote"></p></FORM>';;
    }
  }
  echo '<h2>Casting du film :</h2>';
  echo '<table><tr><th></th><th>Nom</th>';
  foreach($results3 as $ligne)
    echo '<tr><td>'.$ligne['Ordinal'].'</td><td><a href=index.php?actorid='.$ligne['ActorID'].'>'.$ligne['Nom'].'</a></td>';
  echo '</table>';
  echo '<div id="comm"><h2>Commentaires</h2>';
  if (isset($_SESSION['login'])){
    echo '<FORM action="index.php?movieid='.$movieid.'&action=comm" method="post">
    <textarea name="commentaire"  required></textarea>
    <input class="submit" type="Submit" value="Post">
     </FORM>';
  }
  foreach($comm as $ligne2){
    echo '<div class="commbd">';
    echo '<p class="auteur">'.$ligne2['Auteur'].' le '.$ligne2['dateCommFr'].'</p>';
    echo '<p>'.nl2br($ligne2['commentaire']).'</p>';
    echo '</div>';
  }
  echo '</div>';
  $contenu = ob_get_clean();
  require("Views/menu.php");
  require("Views/layout.php");
 ?>
