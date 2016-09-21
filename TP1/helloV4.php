<! DOCTYPE HTML>
<HTML>
	<HEAD>
		<META charset='utf-8'>
		<TITLE>Hello world</TITLE>
		<link rel="stylesheet" type="text/css" href="helloV4.css">
	</HEAD>
	<BODY>
		<form>
		Nombre de Hello World :
		<input type="text" name="nbhello">
		</form>
	<ul>
		<?php
		if(isset($_GET["nbhello"])){
			$cpt=0;
			$nbhello=(int)$_GET["nbhello"];
			if (0 <= $nbhello && $nbhello <= 100){
				for ($i=0; $i<$nbhello; $i++){
					if ($cpt%2 == 0)
						echo '<li id="blue">Hello World!</li>';
					else
						echo '<li id="red">Hello World!</li>';
					$cpt++;
				}
			}
		}
		else{
			echo "<p>erreur dans l'URL</p>";
		}
		?>
	</ul>	
	</BODY>
</HTML>