<!DOCTYPE HTML>
<?php
	require_once("connexion.php");
	$bdd= connexion_db();
	$req=$bdd->query('SELECT Titre, Année, Score, Votes FROM Movie');
	$data=$req->fetchAll(PDO::FETCH_ASSOC);
	$count=$req->rowCount();
 ?>
<HTML>
	<HEAD>
		<title>Listes des films référencés</title>
		<META charset='utf-8'>
		<link rel="stylesheet" type="text/css" href="filmV1.css">
	</HEAD>
	<BODY>
		<h1>Liste des Films</h1>
		<?php

		 ?>



	</BODY>
</HTML>
