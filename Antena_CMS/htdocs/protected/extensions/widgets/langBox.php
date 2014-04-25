<?php
class LangBox extends CWidget
{
    public function run()
    {
        $currentLang = Yii::app()->language;
		$languages = Language::model()->findAllByAttributes(array('active'=>1));
		foreach($languages as $language){
			$lang[] = array(
			'lang'=>$language->lang,
			'title'=>$language->name,
			'flag'=>$language->flagpath
			);
		}
        $this->render('langBox', array('currentLang' => $currentLang, 'languages' => $lang));
    }
}
?>