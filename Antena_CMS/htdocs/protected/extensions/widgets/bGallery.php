<?php
class bGallery extends CWidget
{
    /**
     * @var $data
     */
    public $data;

    public function run()
    {
    	$gallery = GalleryItem::model()->findAllByAttributes(array('gallery_id'=>$this->data['gallery_id']));
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