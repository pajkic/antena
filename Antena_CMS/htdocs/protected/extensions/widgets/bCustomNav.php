<?php
class bCustomNav extends CWidget
{
    /**
     * @var $data
     */
    public $data;
	public $block;
	
	
    public function run()
    {
    	$links = array();
    	foreach($this->data as $post_id) {
    		$links[$post_id] = PostDescription::model()->findByAttributes(array('post_id'=>$post_id,'language_id'=>Language::model()->findByAttributes(array('lang' => Yii::app()->language))->id))->title; 
    	}
        $this->render('bCustomNav',array('data'=>$links,'block'=>$this->block));
        
    }
}
?>
