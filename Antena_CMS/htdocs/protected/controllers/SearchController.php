<?php

class SearchController extends Controller
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
	
	public function actionResults()
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
			$post_criteria->condition = 'status_id=1 AND id IN ('.$post_array.') AND created <= now()';
			
			$post_criteria->order = 'post_type_id, created DESC';
			
			
			//get count
			$count = Post::model()->count($post_criteria);
			 
			/*
			$pages = new CPagination($count);
			$pages->setPageSize(10);
			$pages->applyLimit($post_criteria);
			*/
			//result to show on page
			$post_result = Post::model()->findAll($post_criteria);
			$posts = new CArrayDataProvider($post_result);
			$posts->setPagination(false);
			$this->render('results',array(
				'posts'=> $posts,
				//'pages'=>$pages,
				'post_count'=>$post_array,
			));
	    } else {
			$this->redirect('/site/lang/'.Yii::app()->language);
		}
		
	}

	
	public function actionBlocks($position_id) 
	{

		$blocks = Block::model()->findAllByAttributes(array('block_position_id'=>$position_id, 'status_id'=>1));
		foreach ($blocks as $block) {
			if (in_array(-2,explode(',',$block['pages']))) {
				$this->renderBlock($block);
			}
		}
	}
	
	public function hasBlock($position_id)
	{
		
		$renderBlock = false;
		$blocks = Block::model()->findAllByAttributes(array('block_position_id'=>$position_id, 'status_id'=>1));
		foreach ($blocks as $block) {
			if (in_array(-2,explode(',',$block['pages']))) {
				$renderBlock = true;
			}
		}
		return $renderBlock;
	}	


	
}