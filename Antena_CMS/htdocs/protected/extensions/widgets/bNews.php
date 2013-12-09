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
	
	
    public function run()
    {
    	$content = array();
		foreach ($this->data as $news) {
			$content[$news['id']]['id'] = $news['id'];
			$content[$news['id']]['user_id'] = $news['user_id'];
			if ($this->date == 1) {	
				$content[$news['id']]['date'] = $news['created'];
			} else {
				$content[$news['id']]['date'] = '';
			}
			if ($this->image == 1) {	
				$content[$news['id']]['image'] = $news['image'];
			} else {
				$content[$news['id']]['image'] = '';
			}
			
			foreach($news->postDescriptions as $descriptions) {
				if ($descriptions->language_id == Yii::app()->language){
					$content[$news['id']]['title'] = $descriptions->title;
					if ($this->excerpt == 1) {	
						$content[$news['id']]['excerpt'] = $descriptions->excerpt;
					} else {
						$content[$news['id']]['excerpt'] = '';
					}
				}
			}
		}
		
		
		
        $this->render('bNews',array('data'=>$content));
    }
}
?>