<?php
class bSlider extends CWidget
{
    /**
     * @var $data
     */
    public $data;
	public $block;
	
	
    public function run()
    {
		$gallery = GalleryItem::model()->findAllByAttributes(array('gallery_id'=>$this->data['gallery_id']));
		$images = array();
		foreach ($gallery as $item){
			array_push($images, array(
				'image' => '/uploads/gallery/'.$item->gallery_id.'/'.$item->name,
				'label'=>GalleryItemDescription::model()->findByAttributes(array('language_id'=>Language::model()->findByAttributes(array('lang' => Yii::app()->language))->id,'gallery_item_id'=>$item->id))->title,
				'caption'=>GalleryItemDescription::model()->findByAttributes(array('language_id'=>Language::model()->findByAttributes(array('lang' => Yii::app()->language))->id,'gallery_item_id'=>$item->id))->description
			));
		}
		
        $this->render('bSlider', array('data'=>$images));
    }
}
?>