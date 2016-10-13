<?php
  $titre = "Vérification du compte";
  ob_start();
  echo ' <FORM action="index.php?action=validation" method="post">
     <p><INPUT placeholder="Enter the code given" name="code"></p>
     <p><INPUT type="Submit" value="Valider"></p>
   </FORM>';
  if (isset($erreur)){
    echo "<p id='erreur'>Une erreur est survenue : ".$erreur.'</p>';
  }
  $contenu = ob_get_clean();
  require("Views/menu.php");
  require("Views/layout.php");
 ?>
