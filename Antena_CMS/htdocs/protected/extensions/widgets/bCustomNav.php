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
    	foreach($this->data as $item) {
    		$item_id = ltrim(strrchr($item,'/'),'/');
			$item_type = substr($item,1,4);
			
			switch ($item_type)
			{
				case ('term'):
					$links[$item] = TermDescription::model()->findByAttributes(array('term_id'=>$item_id,'language_id'=>Language::model()->findByAttributes(array('lang' => Yii::app()->language))->id))->title;
					break;
				default:
					$links[$item] = PostDescription::model()->findByAttributes(array('post_id'=>$item_id,'language_id'=>Language::model()->findByAttributes(array('lang' => Yii::app()->language))->id))->title;					
					break;
					
			}
    		 
    	}
		$block_title = BlockDescription::model()->findByAttributes(array('block_id'=>$this->block['id'],'language_id' => Language::model()->findByAttributes(array('lang' => Yii::app()->language))->id))->title;
        $this->render('bCustomNav',array('data'=>$links, 'block'=>$this->block, 'block_title'=>$block_title));
        
    }
}
?>
