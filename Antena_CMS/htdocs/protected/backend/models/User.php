<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property string $id
 * @property integer $lang_id
 * @property string $login
 * @property string $pass
 * @property string $email
 * @property string $display_name
 * @property integer $status
 * @property string $activation_key
 * @property string $created
 * @property string $updated
 * @property string $last_login
 * @property string $avatar
 * @property integer $role_id
 * @property integer $level
 *
 * The followings are the available model relations:
 * @property Post[] $posts
 * @property Role $role
 * @property UserMeta[] $userMetas
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return '{{user}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('login, email, display_name, role_id, level, lang_id, status', 'required'),
			array('login, email, display_name', 'unique'),
			array('email','email'),
			array('pass','required','on'=>'insert'),
			array('lang_id, status, role_id, level', 'numerical', 'integerOnly'=>true),
			array('login, pass, email, display_name', 'length', 'max'=>128),
			array('activation_key', 'length', 'max'=>60),
			array('avatar', 'length', 'max'=>255),
			array('created, updated, last_login', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('login, email, display_name', 'safe', 'on'=>'search'),
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
			'posts' => array(self::HAS_MANY, 'Post', 'users_id'),
			'role' => array(self::BELONGS_TO, 'Role', 'role_id'),
			'language' => array(self::BELONGS_TO, 'Language', 'lang_id'),
			'userMetas' => array(self::HAS_MANY, 'UserMeta', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'lang_id' => Yii::t('app','Jezik'),
			'login' => Yii::t('app','Korisničko ime'),
			'pass' => Yii::t('app','Lozinka'),
			'email' => Yii::t('app','Email'),
			'display_name' => Yii::t('app','Ime na prikazu'),
			'status' => Yii::t('app','Status'),
			'activation_key' => 'Activation Key',
			'created' => Yii::t('app','Kreiran'),
			'updated' => Yii::t('app','Izmenjen'),
			'last_login' => Yii::t('app','Viđen'),
			'avatar' => Yii::t('app','Avatar'),
			'role_id' => Yii::t('app','Uloga'),
			'level' => Yii::t('app','Nivo'),
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

		
		$criteria->compare('login',$this->login,true);
		
		$criteria->compare('email',$this->email,true);
		$criteria->compare('display_name',$this->display_name,true);
		
		$criteria->addCondition('id>1');
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			
		));
	}
}