<?php

/**
 * This is the model class for table "{{post}}".
 *
 * The followings are the available columns in table '{{post}}':
 * @property string $id
 * @property string $name
 * @property string $user_id
 * @property integer $post_type_id
 * @property string $term_id
 * @property string $parent_id
 * @property string $gallery_id
 * @property integer $status
 * @property string $image
 * @property string $guid
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property PostDescription[] $postDescriptions
 */
class Post extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Post the static model class
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
		return '{{post}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, user_id, post_type_id', 'required'),
			array('post_type_id, status', 'numerical', 'integerOnly'=>true),
			array('name, guid, image', 'length', 'max'=>255),
			array('user_id, term_id', 'length', 'max'=>19),
			array('parent_id', 'length', 'max'=>20),
			array('gallery_id', 'length', 'max'=>10),
			array('modified', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, user_id, post_type_id, term_id, parent_id, gallery_id, status, image, guid, created, modified', 'safe', 'on'=>'search'),
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
			'postDescriptions' => array(self::HAS_MANY, 'PostDescription', 'post_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => Yii::t('app','Naslov'),
			'user_id' => Yii::t('app','Korisnik'),
			'post_type_id' => Yii::t('app','Tip'),
			'term_id' => Yii::t('app','Kategorija'),
			'parent_id' => Yii::t('app','Nadređena'),
			'gallery_id' => Yii::t('app','Galerija'),
			'status' => Yii::t('app','Status'),
			'image' => Yii::t('app','Slika'),
			'guid' => Yii::t('app','Url'),
			'created' => Yii::t('app','Kreiran'),
			'modified' => Yii::t('app','Izmenjen'),
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
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('post_type_id',$this->post_type_id);
		$criteria->compare('term_id',$this->term_id,true);
		$criteria->compare('parent_id',$this->parent_id,true);
		$criteria->compare('gallery_id',$this->gallery_id,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('image',$this->image);
		$criteria->compare('guid',$this->guid,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}