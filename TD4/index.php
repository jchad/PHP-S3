<?php
  if (isset($_GET['action']) && $_GET['action']='connection'){
    require("Views/connection.php");
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        require("Model/Model.php");
        require("Model/ConnectionManager.php");
        $cm = new ConnectionManager();
        $results4= $cm->getConnection($username);
        if ($results4 ==NULL){
          $erreur='Utilisateur inexistant';
          require("Views/error.php");
        }else{
          if($results4 != $password){
            $erreur='Mot de passe incorect';
            require("Views/error.php");
          }else{
            $_SESSION['login']=$username;

          }
        }
    }
  }
  else{
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
  }
?>
