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
		$block_title = BlockDescription::model()->findByAttributes(array('block_id'=>$this->block['id'],'language_id' => Language::model()->findByAttributes(array('lang' => Yii::app()->language))->id))->title;
        $this->render('bCustom',array('data'=>$content,'block'=>$this->block, 'block_title'=>$block_title, 'page_title'=>$this->data['title']));
    }
}
?>