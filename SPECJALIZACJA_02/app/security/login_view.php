<!DOCTYPE html>
<html lang="pl-PL">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kantor - Logowanie</title> <!-- Mateusz Gębka 5TI -->
</head>
<body>
  <form action="<?php print(_APP_ROOT); ?>/app/security/login.php" method="post">
    <h2>Logowanie</h2>
      <label for="id_login">login: </label>
      <input id="id_login" type="text" name="login" value="<?php out($form['login']); ?>" />
      <label for="id_pass">pass: </label>
      <input id="id_pass" type="password" name="pass" />
    <input type="submit" value="zaloguj" />
  </form>	

  <?php
  //wyświeltenie listy błędów, jeśli istnieją
  if (isset($messages)) {
    if (count ( $messages ) > 0) {
      echo '<ol style="padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
      foreach ( $messages as $key => $msg ) {
        echo '<li>'.$msg.'</li>';
      }
      echo '</ol>';
    }
  }
  ?>
</body>
</html>