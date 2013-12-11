<?php

class PostController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionView($id)
	{
		// Post content
		
		$post = $this->loadModel($id);
		$content = array();
		foreach ($post->postDescriptions as $descriptions) {
			if ($descriptions->language_id == Yii::app()->language){
				$content['title'] = $descriptions->title;
				$content['excerpt'] = $descriptions->excerpt;
				$content['content'] = $descriptions->content;
			}
		} 
		
		// Gallery
		
		$gallery_id = array($post['gallery_id']);
		$gallery = array(
			'galleries' => $gallery_id,
			'thumb_w' => "80",
			'thumb_h'=> "60",
			'picture_count'=>999,
		);

		// Breadcrumbs
		
		$breadcrumbs = array();
		
		if ($post->post_type_id == 2){
			$parent = $post->parent_id;
			while ($parent != null)
			{
				$title = PostDescription::model()->findByAttributes(array('language_id'=>Yii::app()->language,'post_id'=>$parent))->title;
				$breadcrumbs[$title] = array('/post/'.$parent.'/'.urlencode($title));
				$parent = Post::model()->findByPk($parent)->parent_id;
			}
		} else {
			
			$parent = explode(",",$post->term_id);
			$parent = array_shift($parent);
			
			while ($parent != null)
			{
				$title = TermDescription::model()->findByAttributes(array('language_id'=>Yii::app()->language,'term_id'=>$parent))->title;
				$breadcrumbs[$title] = array('/term/'.$parent.'/'.urlencode($title));
				$parent = Term::model()->findByPk($parent)->parent_id;
			} 	
		}
		
		$breadcrumbs = array_reverse($breadcrumbs);
		$breadcrumbs[0]=$content['title'];		
		
		$this->render('view',array(
			'post'=> $post,
			'content' => $content,
			'gallery' => $gallery,
			'breadcrumbs'=>$breadcrumbs,
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