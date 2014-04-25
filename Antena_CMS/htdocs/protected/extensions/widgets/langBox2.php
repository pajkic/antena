<?php
class LangBox2 extends CWidget
{
    public function run()
    {
        $currentLang = Yii::app()->language;
		$languages = Language::model()->findAllByAttributes(array('active'=>1));
		$currentUrl = Yii::app()->request->url;
		$currentUrl = substr($currentUrl,0,strpos($currentUrl,'lang/'));
		foreach($languages as $language){
			$lang[] = array(
			'lang'=>$language->lang,
			'title'=>$language->name,
			'flag'=>$language->flagpath
			);
		}
        $this->render('langBox2', array('currentUrl' => $currentUrl, 'languages' => $lang));
    }
}
?>