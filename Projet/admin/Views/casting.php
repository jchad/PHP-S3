<?php
  $titre = "Saisir le casting";
  ob_start();
  echo '<FORM action="admin.php?nb='.$nb.'&movieid='.$_GET['movieid'].'&action=validationcasting" method="post">
    <h1>Casting</h1>
    <fieldset id="inputs">';
    for ($i = 1; $i <= $nb; $i++){
      echo ' <INPUT placeholder="Ordinal" name="ordinal'.$i.'" required>
        <INPUT placeholder="Nom" name="nom'.$i.'" required>';
    }
  echo'  </fieldset>
    <fieldset id="actions">
    <INPUT type="Submit" id="submit" value="Ok">
    </fieldset>
  </FORM>';
  $contenu = ob_get_clean();
  require("../Views/menu.php");
  require("../Views/layout.php");
 ?>
