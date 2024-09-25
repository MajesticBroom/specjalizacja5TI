<?php
require_once dirname(__FILE__)."/../config.php";

$kurs = isset($_POST["kurs"]) ? $_POST["kurs"] : null;
$kwota = isset($_POST["kwota"]) ? $_POST["kwota"] : null;
$przewalutowanie = isset($_POST["przewalutowanie"]) ? $_POST["przewalutowanie"] : null;

if ( ! (isset($kurs) && isset($kwota) && isset($przewalutowanie))) {
	//sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
	$errors [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

if ( $kurs == "") {
	$errors [] = 'Nie podano kursu.';
}
if ( $kwota == "") {
	$errors [] = 'Nie podano kwoty.';
}

// function sprawdzPrzecinki($zmienna) {
//   if (strpos($zmienna, ",")) {
//     return str_replace(",", ".", $zmienna);
//   } else {
//     return $zmienna;
//   }
// }


// $kurs = sprawdzPrzecinki($kurs);
// $kwota = sprawdzPrzecinki($kwota);


if (empty( $errors )) {
	
	if (! is_numeric( $kurs )) {
		$errors [] = 'Pierwsza wartość nie jest liczbą.';
	}
	
	if (! is_numeric( $kwota )) {
		$errors [] = 'Druga wartość nie jest liczbą.';
	}	

}


if (empty ( $errors )) { // gdy brak błędów
	
	//konwersja parametrów na int
	$kurs = floatval($kurs);
	$kwota = floatval($kwota);
	
	//wykonanie operacji
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


include "kantor_view.php";

?>