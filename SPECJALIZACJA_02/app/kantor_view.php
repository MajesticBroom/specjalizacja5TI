<!DOCTYPE html>
<html lang="pl-PL">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KANTOR - MATEUSZ GĘBKA</title>
  <style>
    * {
      font-family: "Source Code Pro";
    }
  </style>
</head>
<body>
  <h1>Kantor - Mateusz Gębka</h1>
  <p>Zalogowany użytkownik: <strong><?php isset($role) && print($role) ?></strong></p>

  <div>
    <a href="<?php print(_APP_ROOT); ?>/app/inna_chroniona.php">kolejna chroniona strona</a>
    <br>
    <a href="<?php print(_APP_ROOT)?>/app/security/logout.php">Wyloguj</a>
  </div>

  <form action="<?php print(_APP_URL); ?>/app/kantor.php" method="POST">
    <label for="id_kurs">Kurs:</label>
    <input id="id_kurs" type="number" step="0.01" min="0" name="kurs" value="<?php isset($kurs) ? print($kurs) : print("") ?>" />

    <br />

    <label for="id_kwota">Kwota:</label>
    <input id="id_kwota" type="number" min="0" name="kwota" value="<?php isset($kwota) ? print($kwota) : print("") ?>" />

    <br />

    <label for="id_przewal1">Przewalutowanie:</label>
    <br />
    <input id="id_przewal1" type="radio" name="przewalutowanie" value="1" <?php
      if ((isset($przewalutowanie) && $przewalutowanie == 1) || !isset($przewalutowanie)) {
        print("checked");
      }
    ?> />
    <label for="id_przewal1">PLN => EUR</label>
    <br />
    <input id="id_przewal2" type="radio" name="przewalutowanie" value="2" <?php
      if (isset($przewalutowanie) && $przewalutowanie == 2) {
        print("checked");
      }
    ?> />
    <label for="id_przewal2">EUR => PLN</label>

    <br />

    <input type="submit" value="Oblicz" />
  </form>


    <?php
    
    if (isset($errors)) {
      if (count($errors) > 0) {
        print("<ol style='margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;'>");
        foreach($errors as $key => $err) {
          print("<li>".$err."</li>");
        }
        print("</ol>");
      }
    }


    if (isset($wynik)) {
      $waluta = "";
      if ($przewalutowanie == 1) {
        $waluta = "EUR";
      } else if ($przewalutowanie == 2) {
        $waluta = "PLN";
      }

      print("<div style='margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;'>Wynik: ".$wynik." ".$waluta."</div>");
    }

    ?>
</body>
</html>