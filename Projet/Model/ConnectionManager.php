<?php
  class  ConnectionManager extends Model{

    public function getConnection($Login){
      $sql = 'Select Pass from Utilisateur where Login = :identifiant';
			$req= $this->executerRequete($sql, array('identifiant' => $Login));
			$results = $req->fetch();
      $req->closeCursor();
			return $results['Pass'];
    }
    public function createUser($Login, $password, $nom, $prenom, $mail){
      $code=sha1(rand());
      $sql = 'INSERT INTO utilisateur(Login, Pass, Nom, Prenom, Mail, Code) VALUES (:p_login, :p_pass, :p_nom, :p_prenom, :p_mail, :p_code)';
      $req= $this->executerRequete($sql, array('p_login' => $Login, 'p_pass' => $password, 'p_nom' => $nom, 'p_prenom' => $prenom, 'p_mail' => $mail, 'p_code' => $code));
    }
  }
?>
