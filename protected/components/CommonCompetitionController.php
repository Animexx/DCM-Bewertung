<?php

class CommonCompetitionController extends Controller {
	/** @var null|CompetitionGroup */
	protected $competition_group = null;

	/**
	 * @return array
	 */
	public function filters()
	{
		return array(
			'InitData'
		);
	}

	/**
	 * @param CFilterChain $filterChain
	 */
	public function filterInitData($filterChain) {
		$this->competition_group = CompetitionGroup::model()->findByPk(Yii::app()->params['competitionGroup']);
		$filterChain->run();
	}


}