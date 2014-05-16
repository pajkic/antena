<?php

/**
 * This is the model class for table "{{vehicle_feature_description}}".
 *
 * The followings are the available columns in table '{{vehicle_feature_description}}':
 * @property integer $id
 * @property integer $vehicle_feature_id
 * @property integer $language_id
 * @property string $title
 * @property string $values
 *
 * The followings are the available model relations:
 * @property VehicleFeature $vehicleFeature
 */
class VehicleFeatureDescription extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return VehicleFeatureDescription the static model class
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
		return '{{vehicle_feature_description}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vehicle_feature_id, language_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, vehicle_feature_id, language_id, title, values', 'safe'),
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
			'VehicleFeatures' => array(self::BELONGS_TO, 'VehicleFeature', 'vehicle_feature_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'vehicle_feature_id' => 'Vehicle Feature',
			'language_id' => 'Jezik',
			'title' => 'Naziv',
			'values' => 'Default',
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
		$criteria->compare('vehicle_feature_id',$this->vehicle_feature_id);
		$criteria->compare('language_id',$this->language_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('values',$this->values,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}