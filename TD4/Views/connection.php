<?php
  $titre = "Connexion";
  ob_start();
  echo ' <FORM action="index.php?action=connection" method="post">
     <p><INPUT placeholder="Enter your username" name="username"></p>
     <p><INPUT type="password" placeholder="Enter your password" name="password"></p>
     <p><INPUT type="Submit" value="Log In"></p>
   </FORM>';
  $contenu = ob_get_clean();
  require("Views/menu.php");
  require("Views/layout.php");
 ?>
