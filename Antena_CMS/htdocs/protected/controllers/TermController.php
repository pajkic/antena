<?php

class TermController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionView($id)
	{
		// Term content
		
		$id=(int) $id;
		$term = $this->loadModel($id);
		
		$content = array();
		
		foreach ($term->termDescriptions as $descriptions) {
			if ($descriptions->language_id == Language::model()->findByAttributes(array('lang' => Yii::app()->language))->id){
				$content['title'] = $descriptions->title;
			}
		} 
		
		// Posts
		
		$posts=new CActiveDataProvider('Post', array(
		    'criteria'=>array(
		        'condition'=>'status_id=1 AND FIND_IN_SET('.$id.', term_id)>0',
		        'order'=>'created DESC',
		        //'with'=>array('author'),
		    ),
		    /*'countCriteria'=>array(
		        'condition'=>'status_id=1',
		        // 'order' and 'with' clauses have no meaning for the count query
		    ),*/
		    'pagination'=>array(
		        'pageSize'=>20,
		    ),
		));
		
				
		// Breadcrumbs
		
		$breadcrumbs = array();
		
			
		$parent = $term['parent_id'];
		
		while ($parent != null)	{
			$title = TermDescription::model()->findByAttributes(array('language_id'=>Language::model()->findByAttributes(array('lang' => Yii::app()->language))->id,'term_id'=>$parent))->title;
			$breadcrumbs[$title] = array('/term/'.$parent.'/'.urlencode($title).'/lang/'.Yii::app()->language);
			$parent = Term::model()->findByPk($parent)->parent_id;
			} 	
		
		
		$breadcrumbs = array_reverse($breadcrumbs);
		
		$breadcrumbs[0]=$content['title'];		
		
		$this->pageTitle=Yii::app()->name .' - '. $content['title'];
		
		$this->render('view',array(
			'term'=>$term,
			'posts'=> $posts,
			'content' => $content,
			//'gallery' => $gallery,
			'breadcrumbs'=>$breadcrumbs,
		));
		  
	}

	public function loadModel($id)
	{
		
		$model=Term::model()->findByPk($id);
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