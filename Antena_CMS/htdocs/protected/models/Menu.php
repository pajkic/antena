<?php

/**
 * This is the model class for table "{{menu}}".
 *
 * The followings are the available columns in table '{{menu}}':
 * @property string $id
 * @property integer $lang_id
 * @property string $name
 * @property string $decription
 * @property string $guid
 * @property integer $order
 *
 * The followings are the available model relations:
 * @property MenuItem[] $menuItems
 * @property Post[] $posts
 */
class Menu extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Menu the static model class
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
		return '{{menu}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, decription, guid, order', 'required'),
			array('lang_id, order', 'numerical', 'integerOnly'=>true),
			array('name, decription', 'length', 'max'=>200),
			array('guid', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, lang_id, name, decription, guid, order', 'safe', 'on'=>'search'),
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
			'menuItems' => array(self::HAS_MANY, 'MenuItem', 'menu_id'),
			'posts' => array(self::HAS_MANY, 'Post', 'post_menu_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'lang_id' => 'Jezik',
			'name' => 'Name',
			'decription' => 'Decription',
			'guid' => 'Guid',
			'order' => 'Order',
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
		$criteria->compare('lang_id',$this->lang_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('decription',$this->decription,true);
		$criteria->compare('guid',$this->guid,true);
		$criteria->compare('order',$this->order);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}