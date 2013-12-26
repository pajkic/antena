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
		/*
		$posts=new CActiveDataProvider('Post', array(
		    'criteria'=>array(
		        'condition'=>'status_id=1 AND FIND_IN_SET('.$id.', term_id)>0',
		        'order'=>'created DESC',
		        //'with'=>array('author'),
		    ),
		 */ 
		    /*'countCriteria'=>array(
		        'condition'=>'status_id=1',
		        // 'order' and 'with' clauses have no meaning for the count query
		    ),*/
		   /* 
		    'pagination'=>array(
		        'pageSize'=>2,
		    ),
			
		));
		
		$cr = new CDbCriteria();
		$cr->condition = 'status_id=1 AND FIND_IN_SET('.$id.', term_id)>0';
		$cr->order = 'created DESC';
		$count=Post::model()->count($cr);
    	$pages=new CPagination($count);
		$pages->pageSize=2;
    	$pages->applyLimit($cr);
		*/
		//get criteria
		$criteria = new CDbCriteria();
		$criteria->condition = 'status_id=1 AND FIND_IN_SET('.$id.', term_id)>0 AND created <= now()';
		$criteria->order = 'created DESC';
		 
		//get count
		$count = Post::model()->count($criteria);
		 
		//pagination
		$pages = new CPagination($count);
		$pages->setPageSize(10);
		$pages->applyLimit($criteria);
		 
		//result to show on page
		$result = Post::model()->findAll($criteria);
		$posts = new CArrayDataProvider($result);
 
		
		
				
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
			'pages'=>$pages,
		));
		
		  
	}

	public function actionBlocks($position_id) 
	{
		
		$term_id = $_GET['id'];
		
		$blocks = Block::model()->findAllByAttributes(array('block_position_id'=>$position_id, 'status_id'=>1));
		foreach ($blocks as $block) {
			if ($this->showBlock($block['id'],$term_id)) {
				$this->renderBlock($block);
			}
		}
	}



	private function showBlock($block_id,$term_id)
	{
		$block = Block::model()->findByPk($block_id);
		$block_terms = explode(',',$block->terms);
		if (in_array($term_id, $block_terms)){
			return true;
		} else {
			return false;
		}
	}
	
	public function loadModel($id)
	{
		
		$model=Term::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}
	
	public function hasBlock($position_id)
	{
		$renderBlock = false;
		$term_id = $_GET['id'];
		$blocks = Block::model()->findAllByAttributes(array('block_position_id'=>$position_id, 'status_id'=>1));
		foreach ($blocks as $block) {
			if ($this->showBlock($block['id'],$term_id)) {
				$renderBlock = true;
			}
		}
		return $renderBlock;
	}


}