<?php
class bNews extends CWidget
{
    /**
     * @var $data
     */
    public $data;
	public $image;
	public $date;
	public $excerpt;
	public $block;
	
	
    public function run()
    {
    	$content = array();
		foreach ($this->data as $news) {
			$content[$news['id']]['id'] = $news['id'];
			$content[$news['id']]['user_id'] = $news['user_id'];
			if ($this->date == 1) {	
				$content[$news['id']]['date'] = date('d. m. Y.', strtotime($news['created']));
			} else {
				$content[$news['id']]['date'] = '';
			}
			if ($this->image == 1) {	
				$content[$news['id']]['image'] = $news['image'];
			} else {
				$content[$news['id']]['image'] = '';
			}
			
			$content[$news['id']]['title'] = $news->postDescription->title;
			if ($this->excerpt == 1) {
				$content[$news['id']]['excerpt'] = $news->postDescription->excerpt;
			} else {
				$content[$news['id']]['excerpt'] = '';
			}
			/*
			foreach($news->postDescriptions as $descriptions) {
				if ($descriptions->language_id == Language::model()->findByAttributes(array('lang' => Yii::app()->language))->id){
					$content[$news['id']]['title'] = $descriptions->title;
					if ($this->excerpt == 1) {	
						$content[$news['id']]['excerpt'] = $descriptions->excerpt;
					} else {
						$content[$news['id']]['excerpt'] = '';
					}
				}
			}
			 * 
			 */
		}
		$block_title = BlockDescription::model()->findByAttributes(array('block_id'=>$this->block['id'],'language_id' => Language::model()->findByAttributes(array('lang' => Yii::app()->language))->id))->title;
        $this->render('bNews',array('data'=>$content,'block'=>$this->block,'block_title'=>$block_title));
    }
}
?>