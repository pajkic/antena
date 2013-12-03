<?php

/**
 * This is the model class for table "{{block}}".
 *
 * The followings are the available columns in table '{{block}}':
 * @property string $id
 * @property string $name
 * @property string $block_type_id
 * @property integer $block_position_id
 * @property integer $status_id
 * @property string $options
 * @property string $created
 * @property string $updated
 * @property string $user_id
 *
 * The followings are the available model relations:
 * @property BlockPosition $blockPosition
 * @property BlockType $blockType
 * @property BlockDescription[] $blockDescriptions
 */
class Block extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Block the static model class
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
		return '{{block}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('block_type_id, user_id, name', 'required'),
			array('block_position_id, status_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('block_type_id', 'length', 'max'=>10),
			array('user_id', 'length', 'max'=>20),
			array('options, created, updated', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, block_type_id, block_position_id, status_id, options, created, updated, user_id', 'safe'),
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
			'blockPosition' => array(self::BELONGS_TO, 'BlockPosition', 'block_position_id'),
			'blockType' => array(self::BELONGS_TO, 'BlockType', 'block_type_id'),
			'blockDescriptions' => array(self::HAS_MANY, 'BlockDescription', 'block_id'),
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
			'block_type_id' => Yii::t('app','Tip'),
			'block_position_id' => Yii::t('app','Pozicija'),
			'status' => Yii::t('app','Status'),
			'options' => Yii::t('app','Opcije'),
			'created' => 'Created',
			'updated' => 'Updated',
			'user_id' => 'User',
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('block_type_id',$this->block_type_id,true);
		$criteria->compare('block_position_id',$this->block_position_id);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('options',$this->options,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);
		$criteria->compare('user_id',$this->user_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}