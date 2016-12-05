<?php
  session_start();
  $css='Web/CSS/styles.css';
  require("Model/Model.php");
  require("Model/UserManager.php");
  $um= new UserManager();
  if (isset($_GET['action'])){
    if ($_GET['action']=='logout'){
      session_destroy ();
      header('Location: index.php');
      exit(0); // ou exit (); ou exit ;
    }
    else{
      if ($_GET['action']=='inscription'){
        if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['passwordbis']) && isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email'])){
          $username=$_POST['username'];
          $password=sha1($_POST['password']);
          $passwordbis=sha1($_POST['passwordbis']);
          $nom=$_POST['name'];
          $prenom=$_POST['surname'];
          $mail=$_POST['email'];
          $log=$um->verifLogin($username);
          if($password!=$passwordbis){
            $erreur='Les deux mots de passe ne sont pas identiques.';
          }
          else{
            if($log!=NULL){
              $erreur="Login indisponible";
            }else{
              require("Model/MailManager.php");
              $um->createUser($username, $password, $nom, $prenom, $mail);
              $mm = new MailManager();
              $typemail='register';
              require("Web/Mail.php");
              mail($mail,$sujet,$message_txt);
              $mm->sendMail($mail, $message_txt, $message_html, $sujet);
              $_SESSION['login']=$username;
              header ('Location: index.php?action=validation');
              exit (0); // ou exit (); ou exit ;
              //rediriger vers la page pour valider le compte
            }
          }
      }
        require("Views/inscription.php");
      }else{
        if ($_GET['action']=='connection'){
          if(isset($_POST['username']) && isset($_POST['password'])){
              $username=$_POST['username'];
              $password=sha1($_POST['password']);
              require("Model/MailManager.php");
              $mm = new MailManager();
              $results4= $um->getConnection($username);
              if ($results4==NULL){
                $erreur='Utilisateur inexistant';
              }else{
                if($results4!=$password){
                  $erreur='Mot de passe incorect';
                }else{
                  $_SESSION['login']=$username;
                  $results8= $mm->getCode($username);
                  if($results8!=NULL){  //pas complet
                    header ('Location: index.php?action=validation');
                    exit (0); // ou exit (); ou exit ;
                  }else{
                    header ('Location: index.php');
                    exit (0); // ou exit (); ou exit ;
                  }
                }
              }
          }
          require("Views/connection.php");
        }else{
          if ($_GET['action']=='vote'){
            require("Model/FilmManager.php");
            $fm = new FilmManager();
            $movieid=$_GET['movieid'];
            $fm->addVoteFilm($movieid,$_SESSION['login']);
            header ('Location: index.php?movieid='.$movieid.'');
            exit (0); // ou exit (); ou exit ;
          }else{
            if ($_GET['action']=='validation'){
              if(isset($_POST['code'])){
                $code=$_POST['code'];
                require("Model/MailManager.php");
                $mm = new MailManager();
                $results7= $mm->getCode($_SESSION['login']);
                if($results7==$code){
                  $mm -> removeCode($_SESSION['login']);
                  session_destroy();
                  header ('Location: index.php');
                  exit (0); // ou exit (); ou exit ;
                }
              }
              require("Views/validation.php");
            }else{
              if ($_GET['action']=='unvote'){
                require("Model/FilmManager.php");
                $fm = new FilmManager();
                $movieid=$_GET['movieid'];
                $fm->removeVoteFilm($movieid,$_SESSION['login']);
                header ('Location: index.php?movieid='.$movieid.'');
                exit (0); // ou exit (); ou exit ;
              }else{
                if ($_GET['action']=='search'){
                  $Login=$_POST['searchuser'];
                  $userid=$um->getUserID($Login);
                  header ('Location: index.php?userid='.$userid.'');
                  exit (0); // ou exit (); ou exit ;
                }else{
                  if ($_GET['action']=='comm'){
                    require("Model/FilmManager.php");
                    $fm= new FilmManager();
                    $movieid=$_GET['movieid'];
                    $Login=$_SESSION['login'];
                    $comm=$_POST['commentaire'];
                    $fm->addComm($movieid,$Login,$comm);
                    header ('Location: index.php?movieid='.$movieid.'');
                    exit (0); // ou exit (); ou exit ;
                  }
                }
              }
            }
          }
        }
      }
    }
  }else{
    if (isset($_SESSION['login'])){
        require("Model/MailManager.php");
        $mm = new MailManager();
        $code = $mm->getCode($_SESSION['login']);
        if($code!=NULL){
          header ('Location: index.php?action=validation');
          exit (0); // ou exit (); ou exit ;
        }
    }
    if (isset($_GET['userid'])){
      $userid=$_GET['userid'];
      $verif= $um->verifID($userid);
      if($userid==""){
        $erreur="Utilisateur inexistant";
        require("Views/error.php");
      }else{
        if ($verif == $userid){
          if (isset($_SESSION['login'])){
            $Login=$_SESSION['login'];
            $userco = $um->getUserID($Login);
            if ($userco == $userid){
              $titre="Votre Profil";
            }
            else{
              $Login = $um->getLogin($userid);
              $titre="Profil de $Login";
            }
            $userinfo=$um->getInfoUser($userid);
            $voteuser=$um->getVoteFilmUser($userid);
            require("Views/profil.php");
          }
          else{
            $Login = $um->getLogin($userid);
            $titre="Profil de $Login";
            $userinfo=$um->getInfoUser($userid);
            $voteuser=$um->getVoteFilmUser($userid);
            require("Views/profil.php");
          }
        }
        else{
          $erreur="Pas d'utilisateur pour ce numéro";
          require("Views/error.php");
        }
      }
    }
    else{
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
          $comm= $fm->getComm($movieid);
          if(isset($_SESSION['login'])){
            $results5= $fm->getVoteFilm($movieid,$_SESSION['login']);
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
        if(isset($_GET["order"])){
          $order=$_GET["order"];
          $results= $fm->getFilmsOrder($order);
          $count=count($results);
          require("Views/films.php");
        }
        else{
          if(isset($_GET["actorid"])){
            $actorid=$_GET["actorid"];
            $listefilmsacteur= $fm->getFilmsActeur($actorid);
            $count=count($listefilmsacteur);
            $nomacteur=$fm->getNomActeur($actorid);
            require("Views/acteurs.php");
          }else{
            if(isset($_GET['annee'])){
              $filmsannee=$fm->getFilmsAnnee($_GET['annee']);
              require("Views/filmannee.php");
            }else{
              $results= $fm->getFilms();
              $count=count($results);
              require("Views/films.php");
            }
          }
        }
      }
    }
  }



?>
