<?php
/**
 * @var $this AdminController
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
<h2>Juror hinzufügen</h2>
<form method="POST">
	<label for="person_existierend" class="select"></label>
	<select name="person_existierend" id="person_existierend">
		<option value="">- neuen Nutzer anlegen -</option>
		<?
		/** @var User[] $users */
		$users = User::model()->findAll();
		foreach ($users as $user) {
			echo "<option value='" . $user->id . "'>" . CHtml::encode($user->username) . '</option>';
		}
	?></select>

	<label for="username">Neuer Nutzer: Benutzername</label>
	<input type="text" name="username" id="username" value="">

	<label for="password-1">Neuer Nutzer: Passwort:</label>
	<input type="password" data-clear-btn="true" name="password-1" id="password-1" value="" autocomplete="off">

	<label for="password-2">Neuer Nutzer: Passwort bestätigen</label>
	<input type="password" data-clear-btn="true" name="password-2" id="password-2" value="" autocomplete="off">

	<button name="<?=AntiXSS::createToken("create")?>" type="submit" class="ui-btn ui-icon-plus ui-btn-icon-left">Eintragen</button>
</form>