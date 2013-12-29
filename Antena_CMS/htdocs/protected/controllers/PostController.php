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
			if ($descriptions->language_id == Language::model()->findByAttributes(array('lang' => Yii::app()->language))->id){
				$content['title'] = $descriptions->title;
				$content['excerpt'] = $descriptions->excerpt;
				$content['content'] = $descriptions->content;
			}
		} 
		
		// Gallery
		
		$gallery_id = array($post['gallery_id']);
		$gallery = array(
			'galleries' => $gallery_id,
			'thumb_w' => "129",
			'thumb_h'=> "",
			'picture_count'=>999,
		);

		// Breadcrumbs
		
		$breadcrumbs = array();
		
		if ($post->post_type_id == 2){
			$parent = $post->parent_id;
			while ($parent != null)
			{
				$title = PostDescription::model()->findByAttributes(array('language_id'=>Language::model()->findByAttributes(array('lang' => Yii::app()->language))->id,'post_id'=>$parent))->title;
				$breadcrumbs[$title] = array('/post/'.$parent.'/'.urlencode($title).'/lang/'.Yii::app()->language);
				$parent = Post::model()->findByPk($parent)->parent_id;
			}
		} else {
			
			$parent = explode(",",$post->term_id);
			$parent = array_shift($parent);
			
			while ($parent != null)
			{
				$title = TermDescription::model()->findByAttributes(array('language_id'=>Language::model()->findByAttributes(array('lang' => Yii::app()->language))->id,'term_id'=>$parent))->title;
				$breadcrumbs[$title] = array('/term/'.$parent.'/'.urlencode($title).'/lang/'.Yii::app()->language);
				$parent = Term::model()->findByPk($parent)->parent_id;
			} 	
		}
		
		$breadcrumbs = array_reverse($breadcrumbs);
		$breadcrumbs[0]=$content['title'];		
		$this->pageTitle=Yii::app()->name .' - '. $content['title'];
		$this->render('view',array(
			'post'=> $post,
			'content' => $content,
			'gallery' => $gallery,
			'breadcrumbs'=>$breadcrumbs,
		));
		
	}

	public function actionBlocks($position_id) 
	{
		
		$post_id = $_GET['id'];
		$blocks = Block::model()->findAllByAttributes(array('block_position_id'=>$position_id, 'status_id'=>1));
		foreach ($blocks as $block) {
			if ($this->showBlock($block['id'],$post_id)) {
				$this->renderBlock($block);
			}
		}
	}

	private function showBlock($block_id,$post_id)
	{
		$post = Post::model()->findByPk($post_id);
		$block = Block::model()->findByPk($block_id);
		switch ($post->post_type_id)
		{
			
			case 2: // ako je stranica
				$block_pages = explode(',',$block->pages);
				if (in_array($post_id,$block_pages)) {
					return true;
					break;
				} else {
					$parent_id = $post->parent_id;
					while ($parent_id != null)
					{
						$parent = Post::model()->findByPk($parent_id);
						if (in_array($parent->id,$block_pages)){
							return true;
							break;
						}
						$parent_id = $parent->parent_id;
					}
				}
				return false; 
				break;
			
			default: // ako je clanak
				$block_terms = explode(',',$block->terms);
				$post_terms = explode(',',$post->term_id);
				
				if (count(array_intersect($block_terms, $post_terms)) > 0) {
					return true;
				} else {
					return false;
				}
				break;
		}
		
	}

	public function loadModel($id)
	{
		
		$model=Post::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}
	
	public function hasBlock($position_id)
	{
		
		$renderBlock = false;
		$post_id = $_GET['id'];
		$blocks = Block::model()->findAllByAttributes(array('block_position_id'=>$position_id, 'status_id'=>1));
		foreach ($blocks as $block) {
			if ($this->showBlock($block['id'],$post_id)) {
				$renderBlock = true;
			}
		}
		return $renderBlock;
	}


}