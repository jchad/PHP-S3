<?php
  $titre = "Saisir le casting";
  ob_start();
  echo '<div id="form"><FORM class="form" id="casting" action="admin.php?nb='.$nb.'&movieid='.$_GET['movieid'].'&action=validationcasting" method="post">
    <h1>Casting</h1>
      <div id="inputs">';
    for ($i = 1; $i <= $nb; $i++){
      echo ' <INPUT placeholder="Ordinal" name="ordinal'.$i.'" required>
        <INPUT placeholder="Nom" name="nom'.$i.'" required>';
    }
  echo'  </div>
    <div id="actions">
    <INPUT type="Submit" class="submit" value="Ok">
    </div>
  </FORM></div>';
  $contenu = ob_get_clean();
  require("Views/menu.php");
  require("../Views/layout.php");
 ?>
