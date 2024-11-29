<?php
require_once dirname(__FILE__)."/../../config.php";

// pobranie parametrów funkcją
function getParamsLogin(&$form) {
  $form["login"] = isset($_REQUEST["login"]) ? $_REQUEST["login"] : null;
  $form["pass"] = isset($_REQUEST["pass"]) ? $_REQUEST["pass"] : null;
}

// walidacja parametrów z przygotowaniem zmiennych dla widoku
function validateLogin(&$form, &$messages) {
  // sprawdzenie, czy parametry zostały przekazane
  if (!(isset($form["login"]) && isset($form["pass"]))) {
    return false;
  }

  // sprawdzenie, czy potrzebne wartości zostały przekazane
  if ($form["login"] == "") {
    $messages[] = "Nie podano loginu.";
  }

  if ($form["pass"] == "") {
    $messages[] = "Nie podano hasła";
  }

  // nie ma sensu walidować dalej, gdy brak parametrów
  if (count($messages) > 0) return false;


  // sprawdzenie, czy dane logowania są poprawne
  // w tym przypadku:
  // USER USER
  // lub
  // ADMIN ADMIN

  if ($form['login'] == "admin" && $form['pass'] == "admin") {
		session_start();
		$_SESSION['role'] = 'admin';
		return true;
	}
	if ($form['login'] == "user" && $form['pass'] == "user") {
		session_start();
		$_SESSION['role'] = 'user';
		return true;
	}

  $messages[] = "Niepoprawny login lub hasło.";
  return false;
}

$form = array();
$messages = array();

getParamsLogin($form);

$page_title = 'Kantor JAMNICZEK';
$page_description = 'Przelicz z nami swoje zagraniczne wydatki!';
$page_header = 'JAMNICZEK';
$page_footer = 'Zawsze po stronie waszych pięniędzy!';

if (!validateLogin($form, $messages)) {
  include _ROOT_PATH."/app/security/login_view.php";
} else {
  header("Location: "._APP_URL);
}
?>