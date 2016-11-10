<?php
  $titre = "Saisir le casting";
  ob_start();
  echo '<FORM action="admin.php?movieid='.$movieid.'" method="post">
    <h1>Nombre d\'acteur</h1>
    <fieldset id="inputs">
    <INPUT placeholder="nombre" name="nombre" autofocus required>
    </fieldset>';
  echo'  <fieldset id="actions">
    <INPUT type="Submit" id="submit" value="Ok">
    </fieldset>
  </FORM>';
  $contenu = ob_get_clean();
  require("../Views/menu.php");
  require("../Views/layout.php");
 ?>
