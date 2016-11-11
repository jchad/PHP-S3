<?php
  $titre="Liste des films";
  ob_start();
  echo '<h1>Liste des films</h1>';
  echo '<p>'.$count. ' film(s) trouvé(s) dans la base de données</p>';
  if (isset($_GET["order"])){
    $order=$_GET["order"];
    switch($order){
      case 'titre':
          echo '<table id="tablefilm"><tr><th id="order"><a href="index.php">Titre</a></th>
          <th><a href="index.php?order=annee">Année</a></th>
          <th><a href="index.php?order=score">Score</a></th>
          <th><a href="index.php?order=votes">Votes</a></th></tr>';
          break;
      case 'annee':
          echo '<table id="tablefilm"><tr><th><a href="index.php?order=titre">Titre</a></th>
          <th id="order"><a href="index.php">Année</a></th>
          <th><a href="index.php?order=score">Score</a></th>
          <th><a href="index.php?order=votes">Votes</a></th></tr>';
          break;
      case 'score':
          echo '<table id="tablefilm"><tr><th><a href="index.php?order=titre">Titre</a></th>
          <th><a href="index.php?order=annee">Année</a></th>
          <th id="order"><a href="index.php?">Score</a></th>
          <th><a href="index.php?order=votes">Votes</a></th></tr>';
          break;
      case 'votes':
          echo '<table id="tablefilm"><tr><th><a href="index.php?order=titre">Titre</a></th>
          <th><a href="index.php?order=annee">Année</a></th>
          <th><a href="index.php?order=score">Score</a></th>
          <th id="order"><a href="index.php?">Votes</a></th></tr>';
          break;
    }
  }else{
    echo '<table id="tablefilm"><tr><th><a href="index.php?order=titre">Titre</a></th>
    <th><a href="index.php?order=annee">Année</a></th>
    <th><a href="index.php?order=score">Score</a></th>
    <th><a href="index.php?order=votes">Votes</a></th></tr>';
  }
  foreach($results as $ligne)
    echo '<tr><td><a href="index.php?movieid='.$ligne['MovieID'].'">'.$ligne['Titre'].'</a></td><td><a href="index.php?annee='.$ligne['Année'].'">'.$ligne['Année'].'</a></td><td>'.$ligne['Score'].'</td><td>'.$ligne['Votes'].'</td></tr>';
  echo '</table>';
  $contenu=ob_get_clean();
  require("Views/menu.php");
  require("Views/layout.php");
?>
