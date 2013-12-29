<?php
class bCustom extends CWidget
{
    /**
     * @var $data
     */
    public $data;
	public $block;
	
	
    public function run()
    {
    	$content = PostDescription::model()->findByAttributes(array('post_id'=>$this->data['page_id'],'language_id'=>Language::model()->findByAttributes(array('lang' => Yii::app()->language))->id));
        $this->render('bCustom',array('data'=>$content,'block'=>$this->block));
    }
}
?>