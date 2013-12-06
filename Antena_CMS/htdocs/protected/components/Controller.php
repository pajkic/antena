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
	
	public function actionBlocks($position_id) 
	{
		$blocks = Block::model()->findAllByAttributes(array('block_position_id'=>$position_id));
		foreach ($blocks as $block) {
			
			switch ($block['block_type_id']){
				case 1:
					break;
				case 2:
					
					$this->widget('application.extensions.widgets.bGallery',array(
						'data' => json_decode($block['options'],true)
						));
					break;
				case 3:
					$menus = Menu::model()->findAll(array('order'=>'sort'));
					$array = array();
					
					foreach($menus as $menu) {
						$array[] = array(
						'id'=>$menu['id'],
						'label'=>$menu['name'],
						'url'=> $menu['content'],
						'parent_id'=>$menu['parent_id']
						);
			
					}
					 
					$tree = $this->buildTree($array);
					$this->widget('application.extensions.widgets.bMenu',array(
						'data' => $tree
						));
					break;
				case 4: 
					break;
				case 5:
					break;
				case 6: 
					break;
				case 7:
					break;
				default:
					break;
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