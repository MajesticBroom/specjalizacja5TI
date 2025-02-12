<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';
//załaduj Smarty
require_once _ROOT_PATH.'/lib/smarty/libs/Smarty.class.php';

//pobranie parametrów
function getParams(&$form){
	$form['kurs'] = isset($_REQUEST['kurs']) ? $_REQUEST['kurs'] : null;
	$form['kwota'] = isset($_REQUEST['kwota']) ? $_REQUEST['kwota'] : null;
	$form['przewalutowanie'] = isset($_REQUEST['przewalutowanie']) ? $_REQUEST['przewalutowanie'] : null;	
}

//walidacja parametrów z przygotowaniem zmiennych dla widoku
function validate(&$form,&$infos,&$msgs,&$hide_intro){

	//sprawdzenie, czy parametry zostały przekazane - jeśli nie to zakończ walidację
	if ( ! (isset($form['kurs']) && isset($form['kwota']) && isset($form['przewalutowanie']) ))	return false;	

	$infos [] = 'Przekazano parametry.';

	// sprawdzenie, czy potrzebne wartości zostały przekazane
	if ( $form['kurs'] == "") $msgs [] = 'Nie podano liczby 1';
	if ( $form['kwota'] == "") $msgs [] = 'Nie podano liczby 2';
	
	//nie ma sensu walidować dalej gdy brak parametrów
	if ( count($msgs)==0 ) {
		// sprawdzenie, czy $x i $y są liczbami całkowitymi
		if (! is_numeric( $form['kurs'] )) $msgs [] = 'Pierwsza wartość nie jest liczbą';
		if (! is_numeric( $form['kwota'] )) $msgs [] = 'Druga wartość nie jest liczbą';
	}
	
	if (count($msgs)>0) return false;
	else return true;
}
	
// wykonaj obliczenia
function process(&$form,&$infos,&$msgs,&$result){
	$infos [] = 'Parametry poprawne. Przeliczanie kwoty.';
	
	//konwersja parametrów na float
	$form['kurs'] = floatval($form['kurs']);
	$form['kwota'] = floatval($form['kwota']);
	


  if ($form["przewalutowanie"] == 1) {
    $result = $form["kwota"] * $form["kurs"];
  } else {
    if ($form["kurs"] == 0) {
      $msgs[] = "Nie można dzielić przez 0";
    } else {
      $result = $form["kwota"] / $form["kurs"];
    }
  }
}

//inicjacja zmiennych
$form = null;
$infos = array();
$messages = array();
$result = null;
	
getParams($form);
if ( validate($form,$infos,$messages,$hide_intro) ){
	process($form,$infos,$messages,$result);
}

// 4. Przygotowanie danych dla szablonu

$smarty = new Smarty\Smarty();

$smarty->assign('app_url',_APP_URL);
$smarty->assign('root_path',_ROOT_PATH);
$smarty->assign('page_title','Kantor Jamniczek');
$smarty->assign('page_description','Szablonowanie w bibliotece Smarty');
$smarty->assign('page_header','Z nami korzystnie przeliczysz mamonę!');

//pozostałe zmienne niekoniecznie muszą istnieć, dlatego sprawdzamy aby nie otrzymać ostrzeżenia
$smarty->assign('form',$form);
$smarty->assign('result',$result);
$smarty->assign('messages',$messages);
$smarty->assign('infos',$infos);

// 5. Wywołanie szablonu
$smarty->display(_ROOT_PATH.'/app/calc.html');