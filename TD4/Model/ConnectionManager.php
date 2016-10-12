<?php
  class  ConnectionManager extends Model{

    public function getConnection($Login){
      $sql = 'Select Pass from Utilisateur where Login = :identifiant';
			$req= $this->executerRequete($sql, array('identifiant' => $Login));
			$results = $req->fetch();
			return $results['Pass'];
    }
  }
?>
