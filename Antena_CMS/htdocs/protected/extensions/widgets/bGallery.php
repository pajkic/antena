<?php
class bGallery extends CWidget
{
    /**
     * @var $data
     */
    public $data;
	
	
    public function run()
    {
    	
		$galleries = "(" . implode(',',$this->data['galleries']) . ")";
    	$gallery = GalleryItem::model()->findAll("gallery_id IN ".$galleries);
		$images = array();
		foreach ($gallery as $item){
			array_push($images, array(
				'image' => '/uploads/gallery/'.$item->gallery_id.'/thumbs/'.$item->name,
				'title' => $item->name,
				'caption' => '',
			));
		}
		 
        $this->render('bGallery', array('data'=>$images));
    }
}
?>