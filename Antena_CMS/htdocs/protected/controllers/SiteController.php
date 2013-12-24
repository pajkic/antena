<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;
		
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
		public function actionBlocks($position_id) 
	{
		
		
		$blocks = Block::model()->findAllByAttributes(array('block_position_id'=>$position_id, 'status_id'=>1));
		foreach ($blocks as $block) {
			if (in_array(-1,explode(',',$block['pages'])))
			{
			
			switch ($block['block_type_id']){
				case 1: //bNews
					$params = json_decode($block['options'],true);
					$criteria = new CDbCriteria;
					$criteria->group='post_id';
					$criteria->condition = "term_id IN (" . implode(',',$params['terms']) . ")";
					$posts = TermHasPost::model()->findAll($criteria);
					$p = array();
					foreach($posts as $post) {
						$p[] = $post['post_id'];
					}
					$criteria2 = new CDbCriteria;
					$criteria2->condition = "id IN (" . implode(',',$p) . ") AND status_id = 1 AND post_type_id=1";
					$criteria2->limit = $params['post_count'];
					$criteria2->order = 'created DESC'; 
					$news = Post::model()->findAll($criteria2);
					
					$this->widget('application.extensions.widgets.bNews', array(
						'data' => $news,
						'image'=> $params['image'],
						'date'=> $params['date'],
						'excerpt'=> $params['excerpt']
						));
					break;
				case 2: //bGallery
					$this->widget('application.extensions.widgets.bGallery',array(
						'data' => json_decode($block['options'],true)
						));
					break;
				case 3: //bMenu
					$menus = Menu::model()->findAll(array('order'=>'sort'));
					$array = array();
					
					foreach($menus as $menu) {
						
						if (strpos($menu->content,'post/') !== false OR strpos($menu->content,'term/') !== false) 
							$menu->content .= '/'.urlencode(MenuDescription::model()->findByAttributes(array('language_id'=>Language::model()->findByAttributes(array('lang' => Yii::app()->language))->id,'menu_id'=>$menu->id))->title).'/lang/'.Yii::app()->language;
						$array[] = array(
						'id'=>$menu->id,
						'label'=>MenuDescription::model()->findByAttributes(array('language_id'=>Language::model()->findByAttributes(array('lang' => Yii::app()->language))->id,'menu_id'=>$menu->id))->title,
						'url'=> $menu->content,
						'parent_id'=>$menu->parent_id
						);
			
					}
					
					$menu = array();
					$tree = $this->buildTree($array);
					foreach($tree as $branch){
						array_push($menu,$branch);
					}
					
					$this->widget('application.extensions.widgets.bMenu',array(
						'data' => $menu
						));
					break;
				case 4: //bSubMenu
					if (isset($_GET['id'])){
						$link = '/'.$this->id.'/'.$_GET['id'];
						$menu_item = Menu::model()->findByAttributes(array('content'=>$link));
						$level = null;
						if ($menu_item) $level = $menu_item->level;
						$this->widget('application.extensions.widgets.bSubMenu', array('data'=>$level));
					}
					break;
				case 5: //bBreadcrumbs
					
					$this->widget('zii.widgets.CBreadcrumbs', array(  
		 				'links'=>$this->breadcrumbs,
		 				'homeLink'=>CHtml::link(Yii::app()->name, Yii::app()->homeUrl),   
		 			));
					break;
				case 6: 
					$bcontent = json_decode($block['options'],true);
					$this->widget('application.extensions.widgets.bCustom', array(
						'data'=>$bcontent
					));
					break;
				case 7: //bCustomNav
					$params = json_decode($block['options'],true);
					$this->widget('application.extensions.widgets.bCustomNav',array(
						'data'=>$params
					));
					break;
				default:
					break;
				}
			}
		}
	}
	
	private function buildTree(array $elements, $parentId = 0) {
	    $branch = array();
	
	    foreach ($elements as $element) {

	        if ($element['parent_id'] == $parentId) {
	            $children = $this->buildTree($elements, $element['id']);
	            if ($children) {
	                $element['items'] = $children;
	            }
	            $branch[] = $element;
	        }
	    }
	    return $branch;
	}
}