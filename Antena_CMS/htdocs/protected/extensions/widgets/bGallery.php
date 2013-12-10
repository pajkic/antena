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
		$criteria = new CDbCriteria;
		$criteria->select = "*, rand() as rand";
		$criteria->condition = "gallery_id IN ".$galleries;
		$criteria->order = "rand";
		$criteria->limit = $this->data['picture_count'];
		
		
    	$gallery = GalleryItem::model()->findAll($criteria);
		$images = array();
		foreach ($gallery as $item){
			array_push($images, array(
				'thumb' => '/uploads/gallery/'.$item->gallery_id.'/thumbs/'.$item->name,
				'image' => '/uploads/gallery/'.$item->gallery_id.'/'.$item->name,
			));
		}
		
		//var_dump($this->data);die(); 
        $this->render('bGallery', array('data'=>$images, 'w' => $this->data['thumb_w'], 'h'=>$this->data['thumb_h']));
    }
}
?>