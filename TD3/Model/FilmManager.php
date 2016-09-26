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
      $results=$req->fetch(PDO::FETCH_ASSOC);
      $req->closeCursor();
      return $results;
    }

    public function getFilmDetails($movieid){
      $sql = 'SELECT Titre, Année, Score, Votes FROM Movie WHERE MovieID = :p_movieid';
      $req = $this->executerRequete($sql, array('p_movieid'=> $movieid));
      $results=$req->fetchAll(PDO::FETCH_ASSOC);
      $req->closeCursor();
      return $results;
    }
  }
?>
