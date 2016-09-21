<! DOCTYPE HTML>
<HTML>
	<HEAD>
		<META charset='utf-8'>
		<TITLE>Hello world</TITLE>
	</HEAD>
	<BODY>
	<ul>
		<?php
		$nbhello=(int)$_GET["nbhello"];
		if (0 <= $nbhello && $nbhello <= 100){
			for ($i=0; $i<$nbhello; $i++)
				echo '<li>Hello World!</li>';
		}
		?>
	</ul>	
	</BODY>
</HTML>