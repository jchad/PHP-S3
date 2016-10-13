<?php
  $titre = "Inscription";
  ob_start();
  echo '
    <FORM action="index.php?action=inscription" method="post">
      <p><INPUT placeholder="Enter your name" name="name"></p>
      <p><INPUT placeholder="Enter your surname" name="surname"></p>
      <p><INPUT placeholder="Enter your username" name="username"></p>
      <p><INPUT type="password" placeholder="Enter your password" name="password"></p>
      <p><INPUT type="password" placeholder="Enter your password again" name="passwordbis"></p>
      <p><INPUT type="email" placeholder="Enter your email adress" name="email"></p>
      <p><INPUT type="Submit" value="Register"></p>
    </FORM>';
  if (isset($erreur)){
    echo "<p id='erreur'>".$erreur.'</p>';
  }
  $contenu = ob_get_clean();
  require("Views/menu.php");
  require("Views/layout.php");
 ?>
