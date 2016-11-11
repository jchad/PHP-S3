<?php
  $titre = "Ajout de film";
  ob_start();
  echo '
    <div id="form"><FORM class="form" id="addfilm" action="admin.php?action=addfilm" method="post">
      <h1> Ajout de film </h1>
      <div id="inputs">
      <INPUT placeholder="Titre" name="titre" autofocus required>
      <INPUT placeholder="Année" name="annee" required>
      <INPUT placeholder="Note" name="note" required>
      <INPUT placeholder="Vote" name="vote" required>
      </div>';
    echo'  <div id="actions">
      <INPUT type="Submit" class="submit" value="Ajouter">
      </div>
    </FORM></div>';
  $contenu = ob_get_clean();
  require("Views/menu.php");
  require("../Views/layout.php");
 ?>
