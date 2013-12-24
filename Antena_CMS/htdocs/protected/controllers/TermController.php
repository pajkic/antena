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
			if ($this->showBlock($block['id'],$term_id))
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


}