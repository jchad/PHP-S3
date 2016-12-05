<?php
  class  UserManager extends Model{

    public function getConnection($Login){
      $sql = 'Select Pass from Utilisateur where Login = :identifiant';
			$req= $this->executerRequete($sql, array('identifiant' => $Login));
			$results = $req->fetch();
      $req->closeCursor();
			return $results['Pass'];
    }

    public function getInfoUser($userid){
      $sql = 'SELECT Login, nbVotes, DateInscription from utilisateur where UserID = :p_userid';
      $req = $this->executerRequete($sql, array('p_userid'=> $userid));
      $results=$req->fetch(PDO::FETCH_ASSOC);
      $req->closeCursor();
      return $results;
    }

    public function getVoteFilmUser($userid){
      $sql = 'SELECT m.Titre FROM Movie m join Vote v on m.MovieID=v.MovieID where v.UserID = :p_userid';
      $req = $this->executerRequete($sql, array('p_userid'=> $userid));
      $results=$req->fetchAll(PDO::FETCH_ASSOC);
      $req->closeCursor();
      return $results;
    }

    public function verifID($userid){
      $sql = 'Select UserID from utilisateur where UserID = :p_userid';
      $req = $this->executerRequete($sql, array('p_userid' => $userid));
      $results= $req->fetch(PDO::FETCH_ASSOC);
      $req->closeCursor();
      return $results['UserID'];
    }

    public function verifLogin($Login){
      $sql = 'Select Login from utilisateur where Login = :p_login';
      $req = $this->executerRequete($sql, array('p_login' => $Login));
      $results= $req->fetch(PDO::FETCH_ASSOC);
      $req->closeCursor();
      return $results;
    }

    public function getLogin($userid){
      $sql = 'Select Login from utilisateur where UserID = :p_userid';
      $req = $this->executerRequete($sql, array('p_userid' => $userid));
      $results= $req->fetch(PDO::FETCH_ASSOC);
      $req->closeCursor();
      return $results['Login'];
    }
    public function getUserID($Login){
      $sql = 'Select UserID from utilisateur where Login = :p_login';
      $req = $this->executerRequete($sql, array('p_login' => $Login));
      $results= $req->fetch(PDO::FETCH_ASSOC);
      $req->closeCursor();
      return $results['UserID'];
    }
    public function createUser($Login, $password, $nom, $prenom, $mail){
      $code=sha1(rand());
      $sql = 'INSERT INTO utilisateur(Login, Pass, Nom, Prenom, Mail, Code) VALUES (:p_login, :p_pass, :p_nom, :p_prenom, :p_mail, :p_code)';
      $req= $this->executerRequete($sql, array('p_login' => $Login, 'p_pass' => $password, 'p_nom' => $nom, 'p_prenom' => $prenom, 'p_mail' => $mail, 'p_code' => $code));
    }
  }
?>
