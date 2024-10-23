<?php
require_once dirname(__FILE__)."/../../config.php";

session_start();

// pobranie roli
$role = isset($_SESSION["role"]) ? $_SESSION["role"] : "";

// w przypadku braku parametru (brak zalogowania) to idź na stronę logowania
if (empty($role)) {
  include _ROOT_PATH."/app/security/login.php";

  // zatrzymaj dalsze przetwarzanie skryptów
  exit();
}

// jeśli okej, to idź dalej
?>
