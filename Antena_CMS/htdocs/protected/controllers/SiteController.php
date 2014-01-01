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
			)
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
	
	public function actionSearch()
	{
			
		if(isset($_POST['needle'])) {

		    $search_string =  trim(filter_var($_POST['needle'],FILTER_SANITIZE_MAGIC_QUOTES));
		    $search_array = explode(' ',$search_string);
			$criteria = new CDbCriteria();
			
			foreach ($search_array as $needle) {
				$criteria->compare('title', $needle, true, 'OR');
				$criteria->compare('excerpt', $needle, true, 'OR');
				$criteria->compare('content', $needle, true, 'OR');
			}
			$criteria->compare('language_id',Language::model()->findByAttributes(array('lang' => Yii::app()->language))->id, false);
			$result = PostDescription::model()->findAll($criteria);
			
			
	 		$post_ids = array();
			foreach($result as $description) {
				$post_ids[] = $description->post_id;
			}
			if (count($post_ids)>0){
				$post_array = implode(',',$post_ids);
			} else {
				$post_array = '0';
			}
			
			$post_criteria = new CDbCriteria();
			$post_criteria->condition = 'status_id=1 AND post_type_id = 1 AND id IN ('.$post_array.') AND created <= now()';
			
			$post_criteria->order = 'created DESC';
			 
			//get count
			$count = Post::model()->count($post_criteria);
			 
			//pagination
			/*
			$pages = new CPagination($count);
			$pages->setPageSize(10);
			$pages->applyLimit($post_criteria);
			 */
			//result to show on page
			$post_result = Post::model()->findAll($post_criteria);
			$posts = new CArrayDataProvider($post_result);
		
			$this->render('results',array(
				'posts'=> $posts,
				//'pages'=>$pages,
				'post_count'=>$post_array,
			));
	    } else {
			$this->render('index');
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
			if (in_array(-1,explode(',',$block['pages']))) {
				$this->renderBlock($block);
			}
		}
	}
	
	public function hasBlock($position_id)
	{
		
		$renderBlock = false;
		$blocks = Block::model()->findAllByAttributes(array('block_position_id'=>$position_id, 'status_id'=>1));
		foreach ($blocks as $block) {
			if (in_array(-1,explode(',',$block['pages']))) {
				$renderBlock = true;
			}
		}
		return $renderBlock;
	}	


	
}