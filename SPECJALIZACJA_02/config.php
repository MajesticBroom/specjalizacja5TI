<?php
define("_SERVER_NAME", "localhost");
define("_SERVER_URL", "http://"._SERVER_NAME);
define('_APP_ROOT', '/SPECJALIZACJA/php_02_ochrona_dostepu/SPECJALIZACJA_02');
define('_APP_URL', _SERVER_URL._APP_ROOT);
define("_ROOT_PATH", dirname(__FILE__));

function out(&$param){
	if (isset($param)){
		echo $param;
	}
}
?>