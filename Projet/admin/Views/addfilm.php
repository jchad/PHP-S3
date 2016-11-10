<?php
  $titre = "Ajout de film";
  ob_start();
  echo '
    <FORM action="admin.php?action=addfilm" method="post">
      <h1> Ajout de film </h1>
      <fieldset id="inputs">
      <INPUT placeholder="Titre" name="titre" autofocus required>
      <INPUT placeholder="Année" name="annee" required>
      <INPUT placeholder="Note" name="note" required>
      <INPUT placeholder="Vote" name="vote" required>
      </fieldset>';
    echo'  <fieldset id="actions">
      <INPUT type="Submit" id="submit" value="Ajouter">
      </fieldset>
    </FORM>';
  $contenu = ob_get_clean();
  require("../Views/menu.php");
  require("../Views/layout.php");
 ?>
