<?php

/**
 * This is the model class for table "competition_ratings".
 *
 * The followings are the available columns in table 'competition_ratings':
 * @property integer $adjucator_id
 * @property integer $participant_id
 * @property integer $rating
 * @property integer $order
 */
class CompetitionRating extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'competition_ratings';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('adjucator_id, participant_id, order', 'required'),
			array('adjucator_id, participant_id, rating, order', 'numerical', 'integerOnly' => true),
			array('adjucator_id, participant_id, rating, order', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'adjucator'        => array(self::BELONGS_TO, "CompetitionAdjucator", "adjucator_id"),
			'participant'      => array(self::BELONGS_TO, "CompetitionParticipant", "participant-id"),
			'rating_criterion' => array(self::BELONGS_TO, "CompetitionRatingCriterion", "adjucator_id"),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'adjucator_id'   => 'Adjucator',
			'participant_id' => 'Participant',
			'order'          => 'Position',
			'rating'         => 'Rating',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('adjucator_id', $this->adjucator_id);
		$criteria->compare('participant_id', $this->participant_id);
		$criteria->compare('order', $this->order);
		$criteria->compare('rating', $this->rating);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CompetitionRating the static model class
	 */
	public static function model($className = __CLASS__)
	{
		return parent::model($className);
	}
}
