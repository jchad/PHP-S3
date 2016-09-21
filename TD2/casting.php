<!DOCTYPE HTML>
<?php
	require_once("fonctions/connexion.php");
	$bdd= connexion_db();
	$movieid=(int)$_GET["movieid"];
	$req=$bdd->prepare('SELECT Titre, Année, Score, Votes FROM Movie WHERE MovieID = :p_movieid');
	$req->execute(array('p_movieid'=> $movieid));
	$data = $req->fetch(PDO::FETCH_ASSOC);
	$req->closeCursor();
	$req2=$bdd->prepare('SELECT c.Ordinal, a.Nom FROM Casting c join Actor a on c.ActorID=a.ActorID where MovieID = :p_movieid ORDER BY Ordinal');
	$req2->execute(array('p_movieid'=> $movieid));
	$data2 = $req2->fetchAll(PDO::FETCH_ASSOC);
	$req2->closeCursor();

 ?>
<HTML>
	<HEAD>
		<title>Détails du film</title>
		<META charset='utf-8'>
		<link rel="stylesheet" type="text/css" href="filmV1.css">
	</HEAD>
	<BODY>
		<?php
				if (isset($_GET["movieid"])){
					echo '<h1>Détail du film : '.$data['Titre'].'</h1>' ;
					echo '<h2>Informations sur le film</h2>';
					echo '<ul><li>année de tournage : ' .$data['Année']. '</li>
					<li> score du film : ' .$data['Score']. '</li>
					<li> nombre de votes : ' .$data['Votes']. '</li></ul>';
					echo '<h2>Casting du film :</h2>';
					echo '<table><tr><th></th><th>Nom</th>';
					foreach($data2 as $ligne)
						echo '<tr><td>'.$ligne['Ordinal'].'</td><td>'.$ligne['Nom'].'</td><tr>';
					echo '</table>';
				}
		 ?>




	</BODY>
</HTML>
