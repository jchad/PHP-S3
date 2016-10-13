<?php
  session_start();
  if (isset($_GET['action']) && $_GET['action']=='logout'){
    session_destroy ();
    header('Location: index.php');
    exit(0); // ou exit (); ou exit ;
  }
  if (isset($_GET['action']) && $_GET['action']=='connection'){
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username=$_POST['username'];
        $password=sha1($_POST['password']);
        require("Model/Model.php");
        require("Model/ConnectionManager.php");
        $cm = new ConnectionManager();
        $results4= $cm->getConnection($username);
        if ($results4==NULL){
          $erreur='Utilisateur inexistant';
        }else{
          if($results4==$password){
            $_SESSION['login']=$username;
            header ('Location: index.php');
            exit (0); // ou exit (); ou exit ;
          }else{
            $erreur='Mot de passe incorect';
          }
        }
    }
    require("Views/connection.php");
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
        if(isset($_SESSION['login'])){
          $results5= $fm->getVoteFilm($movieid,$_SESSION['login']);
        }
        if (isset($_GET['action']) && $_GET['action']=='vote'){
          $fm->setVoteFilm($movieid,$_SESSION['login']);
          header ('Location: index.php?movieid='.$movieid.'');
          exit (0); // ou exit (); ou exit ;
        }
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
