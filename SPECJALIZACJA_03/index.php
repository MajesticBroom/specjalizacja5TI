<?php
require_once dirname(__FILE__).'/config.php';

//przekierowanie przeglądarki klienta (redirect)
//header("Location: "._APP_URL."/app/kantor.php");

//przekazanie żądania do następnego dokumentu ("forward")
include _ROOT_PATH.'/app/kantor.php';