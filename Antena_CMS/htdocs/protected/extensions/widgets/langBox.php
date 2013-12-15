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
			case 'text':
				$data[$language['lang']] = $language['name'];
				break;
			case 'flag':
				$data[$language['lang']] = '<img src="/images/backend/languages/'.$language['flagpath'].'"/>';
				break;
			default:
				$data[$language['lang']] = $language['name'].'<img src="/images/backend/languages/'.$language['flagpath'].'"/>';;
				break;
			}
		}
	$this->render('langBox',array('data'=>$data));
   }
}
?>