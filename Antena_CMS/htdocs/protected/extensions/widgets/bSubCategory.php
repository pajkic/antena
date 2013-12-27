<?php
class bSubCategory extends CWidget
{
    /**
     * @var $data
     */
    public $data;
	public $block;

	
    public function run()
    {

    	$items = Post::model()->findAllByAttributes(array('post_type_id'=>'1','status_id'=>'1'));
    	switch ($this->data['type'])
		{
			case 'term':
				
				$subcategory = array(
				'/term/'.$this->data['id'] => TermDescription::model()->findByAttributes(array('language_id'=>Language::model()->findByAttributes(array('lang'=>Yii::app()->language))->id,'term_id'=>$this->data['id']))->title);
				
				foreach($items as $item){
					$terms = explode(',',$item['term_id']);
					if (in_array($this->data['id'],$terms)) {
						$subcategory['/post/'.$item['id']] = PostDescription::model()->findByAttributes(array('language_id'=>Language::model()->findByAttributes(array('lang'=>Yii::app()->language))->id,'post_id'=>$item['id']))->title;
					}
				}
				break;
			case 'post':
				
				$terms = explode(',',Post::model()->findByPk($this->data['id'])->term_id);
				
				$term_id = $terms[0];
				
				$term_title = TermDescription::model()->findByAttributes(array('language_id'=>Language::model()->findByAttributes(array('lang'=>Yii::app()->language))->id,'term_id'=>$term_id))->title;
				$subcategory = array('/term/'.$term_id=>$term_title);
				foreach($items as $item){
					$terms = explode(',',$item['term_id']);
					if (in_array($term_id,$terms)) {
						$subcategory['/post/'.$item['id']] = PostDescription::model()->findByAttributes(array('language_id'=>Language::model()->findByAttributes(array('lang'=>Yii::app()->language))->id,'post_id'=>$item['id']))->title;
					}
				}
				
				break;	
			default:
				break;
		}
    	
		$block_title = BlockDescription::model()->findByAttributes(array('block_id'=>$this->block['id'],'language_id' => Language::model()->findByAttributes(array('lang' => Yii::app()->language))->id))->title;
        $this->render('bSubMenu',array('data'=>$subcategory,'block'=>$this->block,'block_title'=>$block_title));
    }
}
?>
