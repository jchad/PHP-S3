<?php
  class  MailManager extends Model{

    public function getMail($Login){
      $sql = 'Select Mail from Utilisateur where Login = :identifiant';
			$req= $this->executerRequete($sql, array('identifiant' => $Login));
			$results = $req->fetch();
      $req->closeCursor();
			return $results['Mail'];
    }

    public function getCode($Login){
      $sql = 'Select Code from Utilisateur where Login = :p_log';
      $req= $this->executerRequete($sql, array('p_log' => $Login));
      $results = $req->fetch(PDO::FETCH_ASSOC);
      $req->closeCursor();
      return $results['Code'];
    }

    public function removeCode($Login){
      $sql = 'UPDATE utilisateur SET Code=NULL where Login = :identifiant';
      $req= $this->executerRequete($sql, array('identifiant' => $Login));
      $req->closeCursor();
    }

    public function sendMail($emaildest, $message_txt, $message_html, $sujet){
      //$mail = 'democontactphp@gmail.com'; // Déclaration de l'adresse de destination.
      if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $emaildest)) // On filtre les serveurs qui rencontrent des bogues.
      {
      	$passage_ligne = "\r\n";
      }
      else
      {
      	$passage_ligne = "\n";
      }

      //=====Création de la boundary
      $boundary = "-----=".sha1(rand());
      //==========

      //=====Création du header de l'e-mail.
      $header = "From: \"Contact\"<democontactphp@gmail.com>".$passage_ligne;
      $header.= "Reply-to: \"Contact\" <democontactphp@gmail.com>".$passage_ligne;
      $header.= "MIME-Version: 1.0".$passage_ligne;
      $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
      //==========

      //=====Création du message.
      $message = $passage_ligne."--".$boundary.$passage_ligne;
      //=====Ajout du message au format texte.
      $message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
      $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
      $message.= $passage_ligne.$message_txt.$passage_ligne;
      //==========
      $message.= $passage_ligne."--".$boundary.$passage_ligne;
      //=====Ajout du message au format HTML
      $message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
      $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
      $message.= $passage_ligne.$message_html.$passage_ligne;
      //==========
      $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
      $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
      //==========

      //=====Envoi de l'e-mail.
      mail($emaildest,$sujet,$message,$header);
      //==========
    }

  }
?>
