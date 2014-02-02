<?php

/**
 * @var AdminController $this
 * @var User[] $users
 */

?>

<a href="<?=Yii::app()->createUrl("admin/userNew")?>">Neuen Benutzer hinzufügen</a>
<br><br>

<ul data-role="listview" data-inset="true" ><?
	foreach ($users as $user) {
			echo '<li><a href="' . Yii::app()->createUrl("admin/userEdit", array("user_id" => $user->id)) . '">' . CHtml::encode($user->username) . '</a></li>';
	}
	?>
</ul>
