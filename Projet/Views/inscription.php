<?php
  $titre = "Inscription";
  ob_start();
  echo '<div id="form">
    <FORM class="form" id="register" action="index.php?action=inscription" method="post">
      <h1> Register </h1>
      <fieldset id="inputs">
      <INPUT placeholder="Name" name="name" autofocus required>
      <INPUT placeholder="Surname" name="surname" required>
      <INPUT placeholder="Username" name="username" required>
      <INPUT type="password" placeholder="Password" name="password" required>
      <INPUT type="password" placeholder="Enter your password again" name="passwordbis" required>
      <INPUT type="email" placeholder="Mail" name="email" required>
      </fieldset>';
      if (isset($erreur)){
        echo "<p id='erreur2'>".$erreur.'</p>';
      }
    echo'  <fieldset id="actions">
      <INPUT type="Submit" id="submit" value="Register">
      </fieldset>
    </FORM></div>';
  $contenu = ob_get_clean();
  require("Views/menu.php");
  require("Views/layout.php");
 ?>
