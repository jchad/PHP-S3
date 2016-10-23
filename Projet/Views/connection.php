<?php
  $titre = "Connexion";
  ob_start();
  echo '<div id="form"><FORM class="form" id="login" action="index.php?action=connection" method="post">
  <h1>Log In</h1>
  <fieldset id="inputs">
  <INPUT id="username" placeholder="Username" name="username" autofocus required>
  <INPUT id="password" type="password" placeholder="Password" name="password" required>
  </fieldset>';
  if (isset($erreur)){
    echo "<p id='erreur2'>Une erreur est survenue : ".$erreur.'</p>';
  }
  echo '<fieldset id="actions">
      <input type="Submit" id="submit" value="Log In">
      <a href="">Forgot your password?</a><a href="">Register</a>
  </fieldset>
   </FORM></div>';
  $contenu = ob_get_clean();
  require("Views/menu.php");
  require("Views/layout.php");
 ?>
