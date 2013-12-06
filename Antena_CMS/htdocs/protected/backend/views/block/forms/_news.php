<?php 
	
	
	echo TbHtml::Label(Yii::t('app','Kategorije'),'');
	echo TbHtml::checkBoxList('terms[]', $terms['id'], $terms['name']);
//	echo TbHtml::dropDownListControlGroup("gallery_id","", CHtml::listData(Gallery::model()->findAll(), "id", "name"));
	echo TbHtml::Label(Yii::t('app','Broj članaka'),'');
	echo TbHtml::createInput("textField","post_count","5",array('span'=>1));
	echo TbHtml::Label(Yii::t('app','Sa slikom'),'');
	echo TbHtml::checkBox('image','checked');
	
	
?>
