<?php
  class  FilmManager extends Model{

    public function getFilms(){
      $sql = 'SELECT * FROM Movie';
      $req = $this->executerRequete($sql);
      $results=$req->fetchAll(PDO::FETCH_ASSOC);
      $req->closeCursor();
      return $results;
    }

    public function getCasting($movieid){
      $sql = 'SELECT c.Ordinal, a.Nom FROM Casting c join Actor a on c.ActorID=a.ActorID where MovieID = :p_movieid ORDER BY Ordinal';
      $req = $this->executerRequete($sql, array('p_movieid'=> $movieid));
      $results=$req->fetchAll(PDO::FETCH_ASSOC);
      $req->closeCursor();
      return $results;
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
      $results2= $this->executerRequete($sql2, array('p_movieid' => $movieid,'p_userid' => $results['UserID']));
      $results2->closeCursor();
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

  }
?>
