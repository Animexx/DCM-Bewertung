<?php
/**
 * @var AdminController $this
 * @var string[] $oks
 * @var string[] $errors
 */

foreach ($oks as $ok) {
	echo '<div><span data-icon="check"></span> ' . CHtml::encode($ok) . '</div>';
}
foreach ($errors as $error) {
	echo '<div><span data-icon="delete"></span> ' . CHtml::encode($error) . '</div>';
}
?>
<h2>Benutzer hinzufügen</h2>
<form method="POST">
	<label for="username">Neuer Nutzer: Benutzername</label>
	<input type="text" name="username" id="username" value="">

	<label for="password-1">Neuer Nutzer: Passwort:</label>
	<input type="password" data-clear-btn="true" name="password-1" id="password-1" value="" autocomplete="off">

	<label for="password-2">Neuer Nutzer: Passwort bestätigen</label>
	<input type="password" data-clear-btn="true" name="password-2" id="password-2" value="" autocomplete="off">

	<button name="<?=AntiXSS::createToken("create")?>" type="submit" class="ui-btn ui-icon-plus ui-btn-icon-left">Eintragen</button>
</form>