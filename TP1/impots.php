<!DOCTYPE HTML>
<HTML>
	<?php
	if(isset($_POST['sal']) && isset($_POST['nbenfants']))
	{
		if(isset($_POST['marie'])){
			$nbParts=((int)($_POST['nbenfants'])/2)+2;
		}
		else{
			$nbParts=((int)($_POST['nbenfants'])/2)+1;
		}
		$revenuImposable=((int)($_POST['sal']))*0.72;
		$qf=$revenuImposable/$nbParts;
		$quotientFamilial=number_format($qf,2);

		$impot = 0;
		$borne = array(66679, 24872, 11198, 5614);
		$taux = array(0.4, 0.3, 0.14, 0.055);
		$taille = count($borne);
		for ($i = 0; $i < $taille; $i ++){
			if ($qf >= $borne[$i] && $i == 0){
			$impot += ($qf - $borne[$i]) * $taux[$i];
			$qf = $borne[$i];
			}
			else if ($qf >= $borne[$i] && $qf <= $borne[$i-1]){
				$impot += ($qf - $borne[$i]) * $taux[$i];
				$qf = $borne[$i];
			}
		}
			$impot *= $nbParts;
	}
	 ?>
	<HEAD>
		<title>Calcul d'impôts</title>
		<META charset='utf-8'>
	</HEAD>
	<BODY>
		<FORM action="impots.php" method="post">
			<p><LABEL>Nombres d'enfants : <INPUT type='number' name='nbenfants'></LABEL></p>
			<p><LABEL>Marié : <INPUT type='checkbox' name='marie'></LABEL></p>
			<p><LABEL>Salaire annuel : <INPUT type='number' name='sal'></LABEL></p>
			<p><INPUT type='Submit' name='calculer' value='Valider'></p>
		</FORM>
		<?php
				if(isset($_POST['sal']) && isset($_POST['nbenfants'])){
					echo "<p> Votre quotient familial est de : <b> $quotientFamilial </b> €. </p>" ;
					echo "<p> Votre nombre de parts est de : <b> $nbParts </b>. </p>" ;
					echo "<p> Votre impôt prévisionel est de :<b> $impot </b> €. </p>" ;
				}
		 ?>

	</BODY>
</HTML>
