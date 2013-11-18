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
			array('id, lang_id, login, pass, email, display_name, status, activation_key, created, updated, last_login, avatar, role_id, level', 'safe', 'on'=>'search'),
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
			'lang_id' => 'Jezik',
			'login' => 'Korisničko ime',
			'pass' => 'Lozinka',
			'email' => 'Email',
			'display_name' => 'Ime na prikazu',
			'status' => 'Status',
			'activation_key' => 'Activation Key',
			'created' => 'Kreiran',
			'updated' => 'Izmenjen',
			'last_login' => 'Viđen',
			'avatar' => 'Avatar',
			'role_id' => 'Uloga',
			'level' => 'Nivo',
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
		$criteria->compare('login',$this->login,true);
		$criteria->compare('pass',$this->pass,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('display_name',$this->display_name,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('activation_key',$this->activation_key,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('updated',$this->updated,true);
		$criteria->compare('last_login',$this->last_login,true);
		$criteria->compare('avatar',$this->avatar,true);
		$criteria->compare('role_id',$this->role_id);
		$criteria->compare('level',$this->level);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}