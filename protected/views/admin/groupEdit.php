<?php
/**
 * @var AdminController $this
 */

?>

<form method="POST">
	<label for="name">Name der Wettbewerbsreihe</label>
	<input type="text" name="name" id="name" value="">

	<h2>Kriterien</h2>

	<table>
		<thead>
		<tr>
			<th>Pos.</th>
			<th>Name.</th>
			<th>Max. Punkte</th>
		</tr>
		</thead>
		<tbody>
		<?php
		$criteria = $this->competition_group->rating_criteria;
		for ($i = 0; $i < 10; $i++) {
			/** @var CompetitionRatingCriterion $criterion */
			$criterion = (isset($criteria[$i]) ? $criteria[$i] : (object)array(
				"id"         => "new",
				"name"       => "",
				"max_rating" => 10,
				"order"      => ($i + 1)
			));
			?>
			<tr>
			<td style="width: 20%;">
				<input name="rating_pos[<?= $criterion->id ?>]" value="<?= $criterion->order ?>" type="number" size="3">
			</td>
			<td>
				<input name="rating_name[<?= $criterion->id ?>]" value="<?= CHtml::encode($criterion->name) ?>"
				       type="text">
			</td>
			<td style="width: 20%;">
				<input name="rating_max[<?= $criterion->id ?>]" value="<?= $criterion->max_rating ?>" type="number"
				       size="3">
			</td>
			</tr><?php
		}
		?>
		</tbody>
	</table>

	<button name="<?= AntiXSS::createToken("save") ?>" type="submit" class="ui-btn ui-icon-gear ui-btn-icon-left" data-theme="c">
		Speichern
	</button>

</form>