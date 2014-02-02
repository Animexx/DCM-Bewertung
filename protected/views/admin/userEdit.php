<?php
/**
 * @var AdminController $this
 * @var string[] $oks
 * @var string[] $errors
 * @var User $user
 * @var Competition[] $all_competitions
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

	<label for="username">Benutzername</label>
	<input type="text" name="username" id="username" value="">

	<label for="password-1">Neues Passwort:</label>
	<input type="password" data-clear-btn="true" name="password-1" id="password-1" value="" autocomplete="off">

	<label for="password-2">Neues Passwort bestätigen</label>
	<input type="password" data-clear-btn="true" name="password-2" id="password-2" value="" autocomplete="off">

	<fieldset data-role="controlgroup">
		<legend>Juror auf diesen Runden:</legend>
		<? if (count($all_competitions) == 0) echo "<em>Noch keine Runden angelegt</em>";
		else foreach ($all_competitions as $competition) {
			echo '<input type="checkbox" name="adjucator_on[]" id="adjucator_on' . $competition->id . '"';
			foreach ($user->adjucator_of as $comp) if ($comp->competition_id == $competition->id) echo " checked";
			echo '>
	<label for="adjucator_on' . $competition->id . '">' . CHtml::encode($competition->name) . '</label>';
		}
		?>
	</fieldset>

	<br><br>

	<button name="<?= AntiXSS::createToken("create") ?>" type="submit" class="ui-btn ui-icon-gear ui-btn-icon-left">
		Speichern
	</button>
</form>