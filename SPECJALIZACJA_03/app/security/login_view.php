<?php //góra strony z szablonu 
include _ROOT_PATH.'/templates/top.php';
?>
  <form action="<?php print(_APP_ROOT); ?>/app/security/login.php" method="post">
    <h2>Logowanie</h2>
      <label for="id_login">Login: </label>
      <input id="id_login" type="text" name="login" value="<?php out($form['login']); ?>" />
      <br/>
      <label for="id_pass">Hasło: </label>
      <input id="id_pass" type="password" name="pass" />
      <br/>
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

<?php //dół strony z szablonu 
include _ROOT_PATH.'/templates/bottom.php';
?>