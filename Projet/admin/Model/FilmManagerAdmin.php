<?php
  class  FilmManagerAdmin extends Model{
    public function createFilm($titre,$annee,$score,$votes){
      $sql='Select max(MovieID) as idmax from Movie';
      $req= $this->executerRequete($sql);
      $result = $req->fetch(PDO::FETCH_ASSOC);
      $movieid = $result['idmax'] + 1;
      $sql2 = 'INSERT INTO Movie(MovieID,Titre,Année,Score,Votes) VALUES (:p_movieid,:p_titre,:p_annee,:p_score,:p_votes)';
      $req= $this->executerRequete($sql2, array(':p_movieid' => $movieid,':p_titre' => $titre,':p_annee' => $annee,':p_score' =>$score,':p_votes' =>$votes));
      $req->closeCursor();
      return $movieid;
    }

    public function verifActeur($nom){
      $sql = 'Select count(*) as verif from Actor where Nom like :p_nom';
      $req= $this->executerRequete($sql, array(':p_nom' =>$nom));
      $result = $req->fetch(PDO::FETCH_ASSOC);
      $req->closeCursor();
      return $result['verif'];
    }

    public function verifFilm($titre){
      $sql = 'Select count(*) as verif from Movie where Titre like :p_titre';
      $req= $this->executerRequete($sql, array(':p_titre' =>$titre));
      $result = $req->fetch(PDO::FETCH_ASSOC);
      $req->closeCursor();
      return $result['verif'];
    }

    public function createActor($nom){
      $sql='Select max(ActorID) as idmax from Actor';
      $req= $this->executerRequete($sql);
      $result = $req->fetch(PDO::FETCH_ASSOC);
      $actorid = $result['idmax'] + 1;
      $sql2 = 'INSERT INTO Actor(ActorID,Nom) VALUES (:p_actorid,:p_nom)';
      $req= $this->executerRequete($sql2, array(':p_actorid' => $actorid,':p_nom' => $nom));
      $req->closeCursor();
      return $actorid;
    }

    public function getActorID($nom){
      $sql='Select ActorID from Actor where nom like :p_nom';
      $req= $this->executerRequete($sql, array(':p_nom' => $nom));
      $result = $req->fetch(PDO::FETCH_ASSOC);
      $req->closeCursor();
      return $result['ActorID'];
    }

    public function createCasting($movieid,$actorid,$ordinal){
      $sql = 'INSERT INTO Casting(MovieID,ActorID,Ordinal) VALUES (:p_movieid,:p_actorid,:p_ordinal)';
      $req= $this->executerRequete($sql, array(':p_movieid' => $movieid,':p_actorid' => $actorid,':p_ordinal' => $ordinal));
      $req->closeCursor();
    }
  }
?>
