<?php
require_once dirname(__FILE__)."/../config.php";

include _ROOT_PATH."/app/security/check.php";

// pobranie parametrów
function getParams(&$kurs, &$kwota, &$przewalutowanie) {
  $kurs = isset($_POST["kurs"]) ? $_POST["kurs"] : null;
  $kwota = isset($_POST["kwota"]) ? $_POST["kwota"] : null;
  $przewalutowanie = isset($_POST["przewalutowanie"]) ? $_POST["przewalutowanie"] : null;
}

// walidacja z przygotowaniem zmiennych dla widoku
function validate(&$kurs, &$kwota, &$przewalutowanie, &$errors) {
  if (!(isset($kurs) && isset($kwota) && isset($przewalutowanie))) {
    return false;
  }

  if ( $kurs == "") {
    $errors [] = 'Nie podano kursu.';
  }
  if ( $kwota == "") {
    $errors [] = 'Nie podano kwoty.';
  }


  if (count($errors) != 0) return false;

  if (!is_numeric($kurs)) {
    $errors[] = "Kurs powinien być wartością zmiennoprzecinkową.";
  }

  if (!is_numeric($kwota)) {
    $errors[] = "Kwota powinna być wartością zmiennoprzecinkową.";
  }


  if (count($errors) != 0) return false;
  else return true;
}

function process(&$kurs, &$kwota, &$przewalutowanie, &$errors, &$wynik) {
  global $role;

  $kurs = floatval($kurs);
  $kwota = floatval($kwota);

  if ($role != "admin") {
    if ($kwota > 1000) {
      $errors[] = "Tylko ADMIN może obliczać kwoty większe od 1000.";
      return false;
    }  
  }

  switch ($przewalutowanie) {
		case '2' :

      $wynik = $kwota * $kurs;

			break;
		default:
      if ($kurs == 0) {
        $errors[] = "Nie można dzielić przez 0.";
      } else {
        $wynik = $kwota / $kurs;
      }
      break;
	}


  $wynik = round($wynik, 2);
  $wynik = str_replace(".", ",", $wynik);
}

$kurs = null;
$kwota = null;
$przewalutowanie = null;
$errors = array();
$wynik = null;

getParams($kurs, $kwota, $przewalutowanie);
if (validate($kurs, $kwota, $przewalutowanie, $errors)) {
  process($kurs, $kwota, $przewalutowanie, $errors, $wynik);
}

include "kantor_view.php";

?>