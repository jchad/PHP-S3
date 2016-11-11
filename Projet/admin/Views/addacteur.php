<?php
  $titre = "Ajout d'acteur";
  ob_start();
  echo '
    <div id="form"><FORM class="form" id="addacteur" action="admin.php?action=addfilm" method="post">
      <h1> Ajout d\'acteur</h1>
      <div id="inputs">
      <INPUT placeholder="Nom" name="nom" autofocus required>
      </div>';
    echo'  <div id="actions">
      <INPUT type="Submit" class="submit" value="Ajouter">
      </div>
    </FORM></div>';
  $contenu = ob_get_clean();
  require("Views/menu.php");
  require("../Views/layout.php");
 ?>
