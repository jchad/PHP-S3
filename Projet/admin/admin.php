<?php
  require("../Model/Model.php");
  require("Model/FilmManagerAdmin.php");
  $fma= new FilmManagerAdmin();
  $css='../Web/CSS/styles.css';
 // ajout de films, acteur et casting
 if(isset($_GET['add'])){
   if($_GET['add']=='film'){
     require("Views/addfilm.php");
   }else{
     if($_GET['add']=='acteur'){
       require("Views/addacteur.php");
     }
   }
 }else{
   if(isset($_GET['action'])){
     if($_GET['action']=='addfilm'){
       $titreverif=$fma->verifFilm($_POST["titre"]);
       if($titreverif!=0){
         $erreur='Film déjà présent dans la base de donnée';
         require("Views/error.php");
       }else{
         $movieid=$fma->createFilm($_POST["titre"],$_POST["annee"],$_POST["note"],$_POST["vote"]);
         require("Views/nbacteur.php");
       }
     }else{
       if($_GET['action']=='addacteur'){
         $nomac=$_POST["nom"];
         $actorverif=$fma->verifActeur($nomac);
         if($actorverif!=0){
           $erreur='Acteur déjà présent dans la base de donnée';
           require("Views/error.php");
         }else{
           $actorid=$fma->createActor($nomac);
           header ('Location: admin.php');
           exit (0); // ou exit (); ou exit ;
         }
       }else{
         if($_GET['action']=='validationcasting'){
          $nb=$_GET['nb'];
          $movieid=$_GET['movieid'];
          for ($i = 1; $i <= $nb ; $i++){
            $nomac=$_POST["nom$i"];
            $actorid=$fma->getActorID($nomac);
            if ($actorid==NULL){
              $actorid=$fma->createActor($nomac);
              $fma->createCasting($movieid,$actorid,$_POST["ordinal$i"]);
            }else{
        /*      $actorid=$fma->getActorID($_POST["nom$i"]);*/
              $fma->createCasting($movieid,$actorid,$_POST["ordinal$i"]);
            }
          }
          header ('Location: admin.php');
          exit (0); // ou exit (); ou exit ;
         }
       }
     }
   }else{
     if(isset($_GET["movieid"])){
       $nb=$_POST["nombre"];
       require("Views/casting.php");
     }else{
       require("Views/administration.php");
     }
   }
 }

 ?>
