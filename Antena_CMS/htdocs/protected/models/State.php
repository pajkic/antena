<?php

/**
 * This is the model class for table "{{language}}".
 *
 * The followings are the available columns in table '{{language}}':
 * @property integer $id
 * @property string $name
 * @property string $lang
 * @property string $flagpath
 * @property integer $active
 * @property integer $main
 */
class State extends CActiveRecord
{
	public $flagpath;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Language the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{state}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('flagpath','file','types'=>'jpg, jpeg','allowEmpty'=>true),
			array('name, state, active', 'required'),
			array('active, main', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('state', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, state, active, main', 'safe',),
			
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => Yii::t('app','Naziv'),
			'state' => Yii::t('app','Skraćeni naziv'),
			'flagpath' => Yii::t('app','Zastavica'),
			'active' => Yii::t('app','Aktivna'),
			'main' => Yii::t('app','Osnovni'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('state',$this->state,true);
		$criteria->compare('flagpath',$this->flagpath,true);
		$criteria->compare('active',$this->active);
		$criteria->compare('main',$this->main);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}