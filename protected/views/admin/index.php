<?php
/**
 * @var AdminController $this
 */

?>

<ul data-role="listview" data-inset="true" >
	<li><a href="<?=Yii::app()->createUrl("admin/groupEdit")?>">Einstellungen zur Reihe</a></li>
	<li><a href="<?=Yii::app()->createUrl("admin/competitions")?>">Veranstaltungen verwalten</a></li>
	<li><a href="<?=Yii::app()->createUrl("admin/users")?>">Benutzer verwalten</a></li>
</ul>
