<?php 
	
	
	echo TbHtml::Label(Yii::t('app','Kategorije'),'');
	echo TbHtml::checkBoxList('terms[]', $terms['id'], $terms['name']);
//	echo TbHtml::dropDownListControlGroup("gallery_id","", CHtml::listData(Gallery::model()->findAll(), "id", "name"));
	echo TbHtml::Label(Yii::t('app','Broj članaka'),'');
	echo TbHtml::createInput("textField","post_count","5",array('span'=>1));
	echo TbHtml::Label(Yii::t('app','Sa slikom'),'');
	echo TbHtml::checkBox('image','checked',array('name'=>'image'));
	echo TbHtml::Label(Yii::t('app','Prikaži datum'),'');
	echo TbHtml::checkBox('date','checked',array('name'=>'image'));
	echo TbHtml::Label(Yii::t('app','Prikaži uvod'),'');
	echo TbHtml::checkBox('excerpt','checked',array('name'=>'image'));
	
	
	
?>
