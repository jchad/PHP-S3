<!DOCTYPE HTML>
<?php
	require_once("fonctions/connexion.php");
	$bdd= connexion_db();
	$req=$bdd->query('SELECT * FROM Movie');
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
			echo '<p>'.$count. ' film(s) trouvé(s) dans la base de données</p>';
			echo '<table><tr><th>Titre</th><th>Année</th><th>Score</th><th>Votes</th>';
			foreach($data as $ligne)
				echo '<tr><td>'.$ligne['Titre'].'</td><td>'.$ligne['Année'].'</td><td>'.$ligne['Score'].'</td><td>'.$ligne['Votes'].'</td><td><a href="http://localhost/php/PHP-S3/TD2/casting.php?movieid='.$ligne['MovieID'].'">détails</a></td><tr>';
			echo '</table>';
		 ?>



	</BODY>
</HTML>
