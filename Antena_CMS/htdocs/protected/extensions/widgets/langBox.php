<?php
class langBox extends CWidget
{
    /**
     * @var $data
     */
    public $type;
	
	
    public function run()
    {
	$languages = Language::model()->findAllByAttributes(array('active'=>1));
	$data = array();
	foreach($languages as $language) {
		switch ($this->type){
			 
				 
			case 'flag':
				$data[$language['lang']] = '<img src="/images/backend/languages/'.$language['flagpath'].'"/>';
			case 'text':
				$data[$language['lang']] = $language['name'];	 
			default:
				$data[$language['lang']] = $language['name'].'<br> <img src="/images/backend/languages/'.$language['flagpath'].'"/>';;
				 
			}
		}
	$this->render('langBox',array('data'=>$data));
   }
}
?>


