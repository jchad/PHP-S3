<?php
  $titre = "Saisir le casting";
  ob_start();
  echo '<div id="form"><FORM class="form" id="nbacteur" action="admin.php?movieid='.$movieid.'" method="post">
    <h1>Nombre d\'acteur</h1>
    <div id="inputs">
    <INPUT placeholder="nombre" name="nombre" autofocus required>
    </div>';
  echo'  <div id="actions">
    <INPUT type="Submit" class="submit" value="Ok">
    </div>
  </FORM></div>';
  $contenu = ob_get_clean();
  require("Views/menu.php");
  require("../Views/layout.php");
 ?>
