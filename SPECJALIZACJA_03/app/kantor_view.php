<?php //góra strony z szablonu 
include _ROOT_PATH.'/templates/top.php';
?>

<h3>Prosty kalkulator</h2>

<form class="pure-form pure-form-stacked" action="<?php print(_APP_ROOT);?>/app/kantor.php" method="post">
	<fieldset>
		<label for="id_kurs">Kurs:</label>
			<input id="id_kurs" type="number" step="0.01" min="0" name="kurs" value="<?php out($kurs) ?>" />
					
			<label for="y">Kwota:</label>
			<input id="id_kwota" type="number" min="0" name="kwota" value="<?php out($kwota) ?>" />

		<label for="przewalutowanie">Przewalutowanie</label>
		<select id="przewalutowanie" name="przewalutowanie">
			<option value="1">EUR => PLN</option>
			<option value="2">PLN => EUR</option>

		</select>
					
	</fieldset>
	<button type="submit" class="pure-button pure-button-primary">Oblicz</button>
</form>

<div class="messages">

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($errors)) {
	if (count ( $errors ) > 0) {
	echo '<h4>Wystąpiły błędy: </h4>';
	echo '<ol class="err">';
		foreach ( $errors as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>



<?php if (isset($wynik)){ ?>
	<h4>Wynik</h4>
	<p class="res">
<?php

if ($przewalutowanie == 2) $waluta = "EUR";
else $waluta = "PLN";

print($wynik." ".$waluta);
?>
	</p>
<?php } ?>

</div>

<?php //dół strony z szablonu 
include _ROOT_PATH.'/templates/bottom.php';
?>