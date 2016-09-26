<?php
  require("Model/Model.php");
  require("Model/FilmManager.php");
  $fm = new FilmManager();
  $movieid=(int)$_GET["movieid"];
  if (isset($_GET["movieid"])){
    $results2= $fm->getFilmDetails($movieid);
    $results3= $fm->getCasting($movieid);
    require("Views/detailsFilm.php");
  }
  else{
    $results= $fm->getFilms();
    $count=count($results);
    require("Views/films.php");
  }
?>
