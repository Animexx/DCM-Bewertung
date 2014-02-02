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

