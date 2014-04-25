<?php

/**
 * ContactForm class.
 * ContactForm is the data structure for keeping
 * contact form data. It is used by the 'contact' action of 'SiteController'.
 */
class CustomForm extends CFormModel
{
	public $title;
	public $firstname;
	public $lastname;
	public $company;
	public $jobtitle;
	public $address;
	public $department;
	public $city;
	public $zip;
	public $country;
	public $telephone;
	public $email;
	public $comment;
	public $verifyCode;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			// name, email, subject and body are required
			array('title,firstname,lastname,company,jobtitle,country,telephone', 'required'),
			// email has to be a valid email address
			array('email', 'email'),
			array('address, department, city, zip, comment','safe'),
			// verifyCode needs to be entered correctly
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'title' => Yii::t('app','Titula'),
			'firstname' => Yii::t('app','Ime'),
			'lastname' => Yii::t('app','Prezime'),
			'company' => Yii::t('app','Kompanija'),
			'jobtitle' => Yii::t('app','Zvanje'),
			'address' => Yii::t('app','Adresa'),
			'department' => Yii::t('app','Odeljenje'),
			'city' => Yii::t('app','Grad'),
			'zip' => Yii::t('app','Poštanski broj'),
			'country' => Yii::t('app','Republika/Država'),
			'telephone' => Yii::t('app','Telefon'),
			'fax' => Yii::t('app','Faks'),
			'email' => Yii::t('app','E-mail'),
			'comment' => Yii::t('app','Komentar'),
			
			
			'verifyCode'=>Yii::t('app','Sigurnosni kod'),
		);
	}
}