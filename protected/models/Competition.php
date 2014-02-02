<?php

/**
 * This is the model class for table "competitions".
 *
 * The followings are the available columns in table 'competitions':
 * @property integer $id
 * @property integer $preliminary_of
 * @property integer $animexx_event_id
 * @property string $name
 * @property string $date
 * @property integer $max_participants
 * @property integer $max_rating
 * @property integer $group_id
 * @property CompetitionGroup $competition_group
 * @property Competition[] $competition_preliminaries
 * @property Competition competition_final
 * @property CompetitionAdjucator[] $adjucators
 * @property CompetitionParticipant[] $participants
 */
class Competition extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'competitions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('preliminary_of, animexx_event_id, max_participants, max_rating, group_id', 'numerical', 'integerOnly'=>true),
			array('name, date', 'safe'),
			array('id, preliminary_of, animexx_event_id, name, date, max_participants, max_rating, group_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'competition_group' => array(self::BELONGS_TO, 'CompetitionGroup', 'group_id'),
			'competition_preliminaries' => array(self::HAS_MANY, 'Competition', 'preliminary_of'),
			'competition_final' => array(self::BELONGS_TO, 'Competition', 'preliminary_of'),
			'adjucators' => array(self::HAS_MANY, 'CompetitionAdjucator', 'competition_id'),
			'participants' => array(self::HAS_MANY, 'CompetitionParticipant', 'competition_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'preliminary_of' => 'Preliminary Of',
			'animexx_event_id' => 'Animexx Event',
			'name' => 'Name',
			'date' => 'Date',
			'max_participants' => 'Max Participants',
			'max_rating' => 'Max Rating',
			'group_id' => 'Group',
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
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('preliminary_of',$this->preliminary_of);
		$criteria->compare('animexx_event_id',$this->animexx_event_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('max_participants',$this->max_participants);
		$criteria->compare('max_rating',$this->max_rating);
		$criteria->compare('group_id',$this->group_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Competition the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
