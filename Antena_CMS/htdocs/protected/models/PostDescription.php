<?php

/**
 * This is the model class for table "{{post_description}}".
 *
 * The followings are the available columns in table '{{post_description}}':
 * @property string $id
 * @property string $post_id
 * @property integer $language_id
 * @property string $title
 * @property string $excerpt
 * @property string $content
 *
 * The followings are the available model relations:
 * @property Post $post
 */
class PostDescription extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PostDescription the static model class
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
		return '{{post_description}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('post_id, language_id, title', 'required'),
			array('language_id', 'numerical', 'integerOnly'=>true),
			array('post_id', 'length', 'max'=>20),
			array('content', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, post_id, language_id, title, excerpt, content', 'safe'),
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
			'post' => array(self::BELONGS_TO, 'Post', 'post_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'post_id' => 'Post',
			'language_id' => Yii::t('app','Jezik'),
			'title' => Yii::t('app','Naslov'),
			'excerpt' => Yii::t('app','Uvod'),
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
		$criteria->compare('post_id',$this->post_id,true);
		$criteria->compare('language_id',$this->language_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('excerpt',$this->excerpt,true);
		$criteria->compare('content',$this->content,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}