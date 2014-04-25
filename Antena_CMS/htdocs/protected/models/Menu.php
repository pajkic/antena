<?php

/**
 * This is the model class for table "{{menu}}".
 *
 * The followings are the available columns in table '{{menu}}':
 * @property string $id
 * @property string $name
 * @property string $sort
 * @property string $parent_id
 * @property string $level
 * @property string $type
 * @property string $content
 *
 * The followings are the available model relations:
 * @property MenuDescription[] $menuDescriptions
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
			array('name, type', 'required'),
			array('name, content', 'length', 'max'=>255),
			array('sort, level', 'length', 'max'=>10),
			array('parent_id', 'length', 'max'=>20),
			array('type', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, sort, parent_id, level, type, content', 'safe', 'on'=>'search'),
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
			'menuDescriptions' => array(self::HAS_MANY, 'MenuDescription', 'menu_id'),
			'menus' => array(self::HAS_MANY,'Menu','parent_id'),
			'menus' => array(self::BELONGS_TO,'Menu','parent_id'),
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
			'sort' => Yii::t('app','Redosled'),
			'parent_id' => Yii::t('app','Nadređeni'),
			'level' => Yii::t('app','Nivo'),
			'type' => Yii::t('app','Tip'),
			'content' => Yii::t('app','Sadržaj'),
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
		$criteria->compare('sort',$this->sort,true);
		$criteria->compare('parent_id',$this->parent_id,true);
		$criteria->compare('level',$this->level,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('content',$this->content,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}