<?php
  class  FilmManager extends Model{

    public function getFilms(){
      $sql = 'SELECT * FROM Movie';
      $req = $this->executerRequete($sql);
      $results=$req->fetchAll(PDO::FETCH_ASSOC);
      $req->closeCursor();
      return $results;
    }

    public function getFilmsOrder($order){
      switch($order){
        case 'titre':
            $sql = 'SELECT * FROM Movie order by Titre';
            break;
        case 'annee':
            $sql = 'SELECT * FROM Movie order by Année DESC';
            break;
        case 'score':
            $sql = 'SELECT * FROM Movie order by Score DESC';
            break;
        case 'votes':
            $sql = 'SELECT * FROM Movie order by Votes DESC';
            break;
      }
      $req = $this->executerRequete($sql);
      $results=$req->fetchAll(PDO::FETCH_ASSOC);
      $req->closeCursor();
      return $results;
    }

    public function getCasting($movieid){
      $sql = 'SELECT c.Ordinal, a.Nom, a.ActorID FROM Casting c join Actor a on c.ActorID=a.ActorID where MovieID = :p_movieid ORDER BY Ordinal';
      $req = $this->executerRequete($sql, array('p_movieid'=> $movieid));
      $results=$req->fetchAll(PDO::FETCH_ASSOC);
      $req->closeCursor();
      return $results;
    }

    public function getFilmsActeur($actorid){
      $sql = 'SELECT c.Ordinal, m.Titre, m.Année, m.MovieID FROM Casting c join Movie m on c.MovieID=m.MovieID where ActorID = :p_actorid ORDER BY Titre';
      $req = $this->executerRequete($sql, array('p_actorid'=> $actorid));
      $results=$req->fetchAll(PDO::FETCH_ASSOC);
      $req->closeCursor();
      return $results;
    }

    public function getFilmsAnnee($annee){
      $sql = 'SELECT MovieID, Titre, Scores, Votes FROM Movie where Année = :p_annee';
      $req = $this->executerRequete($sql, array('p_annee' => $annee));
      $results=$req->fetchAll(PDO::FETCH_ASSOC);
      $req->closeCursor();
      return $results;
    }

    public function getNomActeur($actorid){
      $sql = 'Select Nom from Actor where ActorID = :p_actorid';
      $req = $this->executerRequete($sql, array('p_actorid' => $actorid));
      $results= $req->fetch();
      $req->closeCursor();
      return $results['Nom'];
    }

    public function getFilmDetails($movieid){
      $sql = 'SELECT Titre, Année, Score, Votes FROM Movie WHERE MovieID = :p_movieid';
      $req = $this->executerRequete($sql, array('p_movieid'=> $movieid));
      $results=$req->fetch(PDO::FETCH_ASSOC);
      $req->closeCursor();
      return $results;
    }

    public function getVoteFilm($movieid,$login){
      $sql = 'SELECT count(*) totalvote FROM Vote WHERE MovieID = :p_movieid and UserID = (Select UserID from utilisateur where Login = :p_login)';
      $req = $this->executerRequete($sql, array('p_movieid'=> $movieid, 'p_login' => $login));
      $results=$req->fetch(PDO::FETCH_ASSOC);
      $req->closeCursor();
      return $results['totalvote'];
    }

    public function addVoteFilm($movieid,$login){
      $sql = 'SELECT UserID FROM utilisateur WHERE Login = :p_login';
      $req = $this->executerRequete($sql, array('p_login' => $login));
      $results=$req->fetch(PDO::FETCH_ASSOC);
      $req->closeCursor();
      $sql2 = 'Insert into Vote(MovieID,UserID) values(:p_movieid,:p_userid)';
      $req= $this->executerRequete($sql2, array('p_movieid' => $movieid,'p_userid' => $results['UserID']));
      $req->closeCursor();
      /*$sql3 = 'Update movie SET Votes = Votes+1 where MovieID = :p_movieid';
      $results3 = $this->executerRequete($sql3, array('p_movieid' => $movieid));
      $results3->closeCursor();   Non nécessaire depuis l'ajout du trigger sur la BDD*/
    }

    public function removeVoteFilm($movieid,$login){
      $sql = 'SELECT UserID FROM utilisateur WHERE Login = :p_login';
      $req = $this->executerRequete($sql, array('p_login' => $login));
      $results=$req->fetch(PDO::FETCH_ASSOC);
      $req->closeCursor();
      $sql2 = 'Delete from Vote where MovieID = :p_movieid and UserID = :p_userid';
      $results2= $this->executerRequete($sql2, array('p_movieid' => $movieid,'p_userid' => $results['UserID']));
      $results2->closeCursor();
    }


    public function getComm($movieid){
      $sql ='SELECT Auteur, commentaire, DATE_FORMAT(dateComm, \'%d/%m/%Y à %Hh%imin%ss\') AS dateCommFr FROM commentaires WHERE MovieID = :p_movieid ORDER BY dateComm';
      $req = $this->executerRequete($sql,array('p_movieid' => $movieid));
      $results=$req->fetchAll(PDO::FETCH_ASSOC);
      $req->closeCursor();
      return $results;
    }
    public function addComm($movieid,$login,$comm){
      $sql = 'Insert into commentaires(MovieID,Auteur,commentaire,dateComm) values(:p_movieid,:p_login,:p_comm, sysdate())';
      $req= $this->executerRequete($sql, array('p_movieid' => $movieid,'p_login' => $login,'p_comm' => $comm));
      $req->closeCursor();
    }
  }
?>
