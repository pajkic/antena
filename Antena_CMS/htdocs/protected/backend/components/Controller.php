<?php

	define('EDITOR', 10);
	define('SUPER_EDITOR', 20);
	define('ADMINISTRATOR', 30);
	define('SUPERADMINISTRATOR', 40);

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	
	public $userData;
	
	function init()
	{
		parent::init();
		$app = Yii::app();
		
		if (isset(Yii::app()->user->language)) {
			$app->language = Yii::app()->user->language;
		} else {
			$lang = Language::model()->findByAttributes(array('main'=>1));
			$app->language = $lang->lang;
		}
		 if (!Yii::app()->user->isGuest) $this->userData = User::model()->findByPk(Yii::app()->user->id);
	}
	
	public function allowUser($min_level) { 
	    $current_level = -1;
	    if ($this->userData !== null)
	        $current_level = $this->userData->level;
	    if ($min_level > $current_level) {
	        throw new CHttpException(403, 'Nemate ovlašćenja za ovu akciju.');
	}
}
	
}