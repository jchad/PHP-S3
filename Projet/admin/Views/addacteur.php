<?php
  $titre = "Ajout d'acteur";
  ob_start();
  echo '
    <FORM action="admin.php?action=addfilm" method="post">
      <h1> Ajout d\'acteur</h1>
      <fieldset id="inputs">
      <INPUT placeholder="Nom" name="nom" autofocus required>
      </fieldset>';
    echo'  <fieldset id="actions">
      <INPUT type="Submit" id="submit" value="Ajouter">
      </fieldset>
    </FORM>';
  $contenu = ob_get_clean();
  require("../Views/menu.php");
  require("../Views/layout.php");
 ?>
