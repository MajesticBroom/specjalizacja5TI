<?php
/* Smarty version 5.4.1, created on 2025-02-12 11:53:53
  from 'file:D:\xampp\htdocs\php_04_uproszczony_nowe_Smarty/app/calc.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_67ac7dc111f984_95715393',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '615b3b45f01a634d4369c9e3adef0d09dfac8891' => 
    array (
      0 => 'D:\\xampp\\htdocs\\php_04_uproszczony_nowe_Smarty/app/calc.html',
      1 => 1739357619,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67ac7dc111f984_95715393 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\xampp\\htdocs\\php_04_uproszczony_nowe_Smarty\\app';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_11621453567ac7dc10e1c79_68376291', 'footer');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_7101233267ac7dc10eee55_28671829', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "../templates/main.html", $_smarty_current_dir);
}
/* {block 'footer'} */
class Block_11621453567ac7dc10e1c79_68376291 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\xampp\\htdocs\\php_04_uproszczony_nowe_Smarty\\app';
?>
przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_7101233267ac7dc10eee55_28671829 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\xampp\\htdocs\\php_04_uproszczony_nowe_Smarty\\app';
?>


<h3>Kantor Jamniczek</h2>


<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->getValue('app_url');?>
/app/calc.php" method="post">
	<fieldset>
		<label for="kurs">Kurs:</label>
		<input id="kurs" type="number" name="kurs" value="<?php echo $_smarty_tpl->getValue('form')['kurs'];?>
">
		<label for="przewalutowanie">Przewalutowanie</label>
		<select id="przewalutowanie" name="przewalutowanie">

<?php if ((null !== ($_smarty_tpl->getValue('form')['przewalutowanie_name'] ?? null))) {?>
<option value="<?php echo $_smarty_tpl->getValue('form')['przewalutowanie'];?>
">ponownie: <?php echo $_smarty_tpl->getValue('form')['przewalutowanie_name'];?>
</option>
<option value="" disabled="true">---</option>
<?php }?>
			<option value="1">EUR => PLN</option>
			<option value="2">PLN => EUR</option>
		</select>
					
		<label for="kwota">Kwota:</label>
		<input id="kwota" type="number" name="kwota" value="<?php echo $_smarty_tpl->getValue('form')['kwota'];?>
">
	</fieldset>
	<button type="submit" class="pure-button pure-button-primary">Przelicz</button>
</form>

<div class="messages">

<?php if ((null !== ($_smarty_tpl->getValue('messages') ?? null))) {?>
	<?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('messages')) > 0) {?> 
		<h4>Wystąpiły błędy: </h4>
		<ol class="err">
		<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('messages'), 'msg');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach0DoElse = false;
?>
		<li><?php echo $_smarty_tpl->getValue('msg');?>
</li>
		<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
		</ol>
	<?php }
}?>

<?php if ((null !== ($_smarty_tpl->getValue('infos') ?? null))) {?>
	<?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('infos')) > 0) {?> 
		<h4>Informacje: </h4>
		<ol class="inf">
		<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('infos'), 'msg');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach1DoElse = false;
?>
		<li><?php echo $_smarty_tpl->getValue('msg');?>
</li>
		<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
		</ol>
	<?php }
}?>

<?php if ((null !== ($_smarty_tpl->getValue('result') ?? null))) {?>
	<h4>Wynik</h4>
	<p class="res">
	<?php echo $_smarty_tpl->getValue('result');?>

	</p>
<?php }?>

</div>

<?php
}
}
/* {/block 'content'} */
}
