<?php

/**
 * This is the model class for table "{{vehicle_has_price}}".
 *
 * The followings are the available columns in table '{{vehicle_has_price}}':
 * @property integer $vehicle_id
 * @property integer $pricelist_id
 * @property integer $pricedays_id
 * @property string $price
 *
 * The followings are the available model relations:
 * @property Pricedays $pricedays
 * @property Pricelist $pricelist
 * @property Vehicle $vehicle
 */
class VehicleHasPrice extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return VehicleHasPrice the static model class
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
		return '{{vehicle_has_price}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('vehicle_id, pricelist_id, pricedays_id', 'required'),
			array('vehicle_id, pricelist_id, pricedays_id', 'numerical', 'integerOnly'=>true),
			array('price', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('vehicle_id, pricelist_id, pricedays_id, price', 'safe', 'on'=>'search'),
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
			'pricedays' => array(self::BELONGS_TO, 'Pricedays', 'pricedays_id'),
			'pricelist' => array(self::BELONGS_TO, 'Pricelist', 'pricelist_id'),
			'vehicle' => array(self::BELONGS_TO, 'Vehicle', 'vehicle_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'vehicle_id' => 'Vehicle',
			'pricelist_id' => 'Pricelist',
			'pricedays_id' => 'Pricedays',
			'price' => 'Price',
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

		$criteria->compare('vehicle_id',$this->vehicle_id);
		$criteria->compare('pricelist_id',$this->pricelist_id);
		$criteria->compare('pricedays_id',$this->pricedays_id);
		$criteria->compare('price',$this->price,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}