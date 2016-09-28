<?php
  require("Model/Model.php");
  require("Model/FilmManager.php");
  $fm = new FilmManager();
  if (isset($_GET["movieid"])){
    $movieid=(int)$_GET["movieid"];
    if ($movieid==""){
      $erreur='Identifiant de film requis';
      require("Views/error.php");
    }
    else{
      $results2= $fm->getFilmDetails($movieid);
      $results3= $fm->getCasting($movieid);
      if ($results2==NULL){
        $erreur='Identifiant de film incorrect';
        require("Views/error.php");
      }
      else{
        require("Views/detailsFilm.php");
      }
    }
  }
  else{
    $results= $fm->getFilms();
    $count=count($results);
    require("Views/films.php");
    }
?>
