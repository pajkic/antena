<?php
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
	
	function init()
	{
		
		parent::init();
		
		$app = Yii::app();
		if (isset($_GET['lang']))
		{
			$languages = Language::model()->findAllByAttributes(array('active'=>1));
			foreach ($languages as $language) {
				$lang[]=$language['lang'];
			}
			if (in_array($_GET['lang'], $lang)) {
				$app->language = $_GET['lang'];
				$app->session['_lang'] = $app->language;
			}
		}
		
        else if (isset($app->session['_lang']))
        {
            $app->language = $app->session['_lang'];
			$this->redirect('/lang/'.$app->language);
        }
		else 
		{
			$this->redirect('/lang/'.Language::model()->findByAttributes(array('main'=>1))->lang);
		}
		
	}
	
	public function renderBlock($block,$save=FALSE)
	{
		switch ($block['block_type_id'])
		{
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
			
			return $this->widget('application.extensions.widgets.bNews', array(
				'data' => $news,
				'image'=> $params['image'],
				'date'=> $params['date'],
				'excerpt'=> $params['excerpt'],
				'block'=>$block,
				),$save);
			break;
		case 2: //bGallery
			return $this->widget('application.extensions.widgets.bGallery',array(
				'data' => json_decode($block['options'],true),
				'block'=>$block,
				),$save);
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
			
			return $this->widget('application.extensions.widgets.bMenu',array(
				'data' => $menu
				),$save);
			
			break;
		case 4: //bSubMenu
			if (isset($_GET['id'])){
				$link = '/'.$this->id.'/'.$_GET['id'];
				$menu_item = Menu::model()->findByAttributes(array('content'=>$link));
				$level = null;
				if ($menu_item) $level = $menu_item->level;
				return $this->widget('application.extensions.widgets.bSubMenu', array('data'=>$level,'block'=>$block,'menu_item'=>$menu_item,),$save);
			}
			break;
		case 5: //bBreadcrumbs
			
			return $this->widget('zii.widgets.CBreadcrumbs', array(  
 				'links'=>$this->breadcrumbs,
 				'homeLink'=>CHtml::link(Yii::app()->name, Yii::app()->homeUrl),   
 			),$save);
			break;
		case 6: 
			$bcontent = json_decode($block['options'],true);
			return $this->widget('application.extensions.widgets.bCustom', array(
				'data'=>$bcontent,
				'block'=>$block,
			),$save);
			break;
		case 7: //bCustomNav
			$params = json_decode($block['options'],true);
			return $this->widget('application.extensions.widgets.bCustomNav',array(
				'data'=>$params,
				'block'=>$block,
			),$save);
			break;
		case 8:
			$params = json_decode($block['options'],true);
			return $this->widget('application.extensions.widgets.bSlider', array(
				'data'=>$params,
				'block'=>$block,
			),$save);
			break;
		case 9: //bSubCategory
			if (isset($_GET['id'])){
				return $this->widget('application.extensions.widgets.bSubCategory', array('data'=>array('type'=>$this->id,'id'=>$_GET['id']),'block'=>$block),$save);
			}
			break;
		case 10: // bAccordion
			$params = json_decode($block['options'],true);
			$acc_blocks=array();
			foreach($params as $block_id)
			{
				$b = Block::model()->findByPk($block_id);
				$b_title = BlockDescription::model()->findByAttributes(array('language_id'=>Language::model()->findByAttributes(array('lang' => Yii::app()->language))->id,'block_id'=>$b->id))->title;
				$acc_blocks[$b_title] = $this->renderBlock($b,TRUE);	
			}
			return $this->widget('application.extensions.widgets.bAccordion', array('data'=>$acc_blocks, 'block'=>$block));
			break;
		case 11: // bTabs
			$params = json_decode($block['options'],true);
			$tab_blocks=array();
			foreach($params as $block_id)
			{
				$b = Block::model()->findByPk($block_id);
				$b_title = BlockDescription::model()->findByAttributes(array('language_id'=>Language::model()->findByAttributes(array('lang' => Yii::app()->language))->id,'block_id'=>$b->id))->title;
				$tab_blocks[$b_title] = $this->renderBlock($b,TRUE);	
			}
			return $this->widget('application.extensions.widgets.bTabs', array('data'=>$tab_blocks, 'block'=>$block));
			break;
		case 12: //bSearch
			return $this->widget('application.extensions.widgets.bSearch',array(),$save);
			break;
	
		default:
			break;
		}

	}	

	public function buildTree(array $elements, $parentId = 0) {
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