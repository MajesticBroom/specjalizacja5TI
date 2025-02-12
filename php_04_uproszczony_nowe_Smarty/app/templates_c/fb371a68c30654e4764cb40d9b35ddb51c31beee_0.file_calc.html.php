<?php
/* Smarty version 5.4.1, created on 2025-02-12 12:34:19
  from 'file:D:\xampp\htdocs\php_04_uproszczony_nowe_Smarty/app/calc.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.1',
  'unifunc' => 'content_67ac873bed9711_86329106',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fb371a68c30654e4764cb40d9b35ddb51c31beee' => 
    array (
      0 => 'D:\\xampp\\htdocs\\php_04_uproszczony_nowe_Smarty/app/calc.html',
      1 => 1739360055,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_67ac873bed9711_86329106 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\xampp\\htdocs\\php_04_uproszczony_nowe_Smarty\\app';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_54207391367ac873bebd903_16777347', 'footer');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_88800569467ac873bec35c0_89346716', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "../templates/main.html", $_smarty_current_dir);
}
/* {block 'footer'} */
class Block_54207391367ac873bebd903_16777347 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\xampp\\htdocs\\php_04_uproszczony_nowe_Smarty\\app';
?>

  <a href="https://media.tenor.com/WP2NxV9cUYUAAAAe/shelf.png" class="stopka">Zapraszamy na Facebooka!</a>
<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_88800569467ac873bec35c0_89346716 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'D:\\xampp\\htdocs\\php_04_uproszczony_nowe_Smarty\\app';
?>


<h3>Przelicz żądaną kwotę</h2>


<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->getValue('app_url');?>
/app/calc.php" method="post">
	<fieldset>
		<label for="kurs">Kurs:</label>
		<input id="kurs" type="number" name="kurs" value="<?php echo $_smarty_tpl->getValue('form')['kurs'];?>
" step="0.1">
		<label for="przewalutowanie">Przewalutowanie</label>
		<select id="przewalutowanie" name="przewalutowanie">
			<option value="1">EUR => PLN</option>
			<option value="2">PLN => EUR</option>
		</select>
					
		<label for="kwota">Kwota:</label>
		<input id="kwota" type="number" name="kwota" value="<?php echo $_smarty_tpl->getValue('form')['kwota'];?>
" step="0.1">
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
		<h4>Informacje:</h4>
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
	<h4>Przeliczona kwota:</h4>
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
