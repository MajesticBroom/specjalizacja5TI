<?php
require_once dirname(__FILE__).'/../config.php';
//ochrona widoku
include _ROOT_PATH.'/app/security/check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KANTOR</title>
</head>
<body>
  <h2>Kolejna chroniona strona</h2>
  <a href="<?php print(_APP_ROOT); ?>/app/kantor.php">Strona główna</a>
  <br>
  <a href="<?php print(_APP_ROOT)?>/app/security/logout.php">Wyloguj</a>

</body>
</html>