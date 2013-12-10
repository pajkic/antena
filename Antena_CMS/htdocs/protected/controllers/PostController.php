<?php

class PostController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionView($id)
	{
		$post = $this->loadModel($id);
		$content = array();
		foreach ($post->postDescriptions as $descriptions) {
			if ($descriptions->language_id == Yii::app()->language){
				$content['title'] = $descriptions->title;
				$content['excerpt'] = $descriptions->excerpt;
				$content['content'] = $descriptions->content;
			}
		} 
		if ($post->post_type_id = 2){
			//formiranje breadcrumba za stranu
		} else {
			//formiranje breadcrumba za članak
		}
		
		
		$this->render('view',array(
			'post'=> $post,
			'content' => $content
		));
	}

	public function loadModel($id)
	{
		
		$model=Post::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}


	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}