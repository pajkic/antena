<?php
class bSubMenu extends CWidget
{
    /**
     * @var $data
     */
    public $data;
	public $block;
	public $menu_item;
	
	
    public function run()
    {
    	
		$items = Menu::model()->findAll('parent_id=:t1 OR parent_id=:t2 OR id=:t3 OR id=:t4', array(':t1'=>$this->menu_item['id'],':t2'=>$this->menu_item['parent_id'],':t3'=>$this->menu_item['id'],':t4'=>$this->menu_item['parent_id']));
		//$submenu = array($this->menu_item['id']=>MenuDescription::model()->findByAttributes(array('language_id'=>Language::model()->findByAttributes(array('lang' => Yii::app()->language))->id,'menu_id'=>$this->menu_item['id']))->title);
		$submenu=array();
		
		foreach($items as $item) {
			$item_link = $item['content'];
			$submenu[$item_link] = MenuDescription::model()->findByAttributes(array('language_id'=>Language::model()->findByAttributes(array('lang' => Yii::app()->language))->id,'menu_id'=>$item['id']))->title;
		}
		$block_title = BlockDescription::model()->findByAttributes(array('block_id'=>$this->block['id'],'language_id' => Language::model()->findByAttributes(array('lang' => Yii::app()->language))->id))->title;
        $this->render('bSubMenu',array('data'=>$submenu,'block'=>$this->block,'block_title'=>$block_title));
    }
}
?>
