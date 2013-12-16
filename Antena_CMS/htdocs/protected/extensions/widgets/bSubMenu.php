<?php
class bSubMenu extends CWidget
{
    /**
     * @var $data
     */
    public $data;
	
	
    public function run()
    {
    	
    	$items = Menu::model()->findAllByAttributes(array('level'=>$this->data));
		$submenu = array();
		foreach($items as $item) {
			$submenu[$item['id']] = MenuDescription::model()->findByAttributes(array('language_id'=>Language::model()->findByAttributes(array('lang' => Yii::app()->language))->id,'menu_id'=>$item['id']))->title;
			
		}
        $this->render('bSubMenu',array('data'=>$submenu));
    }
}
?>
