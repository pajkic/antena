<?php

/**
 * This is the model class for table "{{term}}".
 *
 * The followings are the available columns in table '{{term}}':
 * @property string $id
 * @property string $order
 * @property string $name
 * @property string $parent_id
 * @property string $description_url
 * @property string $group
 *
 * The followings are the available model relations:
 * @property TermTaxonomy[] $termTaxonomies
 */
class Term extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Term the static model class
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
		return '{{term}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('sort', 'numerical', 'integerOnly'=>true),
			array('name, image','length', 'max'=>255),
			//array('parent_id', 'length', 'max'=>20),
			
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, sort, name, image, parent_id, excerpt', 'safe'),
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
		'terms' => array(self::HAS_MANY, 'Term', 'parent_id'),
		'terms' => array(self::BELONGS_TO, 'Term', 'parent_id'),
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'sort' => Yii::t('app','Redosled'),
			'name' => Yii::t('app','Naziv'),
			'image' => Yii::t('app','Slika'),
			'excerpt' => Yii::t('app','Prikaži uvod'),
			'parent_id' => Yii::t('app','Nadređena'),
			'description_url' => Yii::t('app','Opisni URL'),
			'group' => Yii::t('app','Grupa'),
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
		$criteria->compare('sort',$this->sort,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('parent_id',$this->parent_id,true);
		$criteria->compare('description_url',$this->description_url,true);
		$criteria->compare('group',$this->group,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}