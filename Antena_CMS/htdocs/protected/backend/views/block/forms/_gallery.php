<?php 
	
	
	echo TbHtml::Label(Yii::t('app','Galerije'),'');
	echo TbHtml::checkBoxList('galleries[]', $galleries['id'], $galleries['name']);
//	echo TbHtml::dropDownListControlGroup("gallery_id","", CHtml::listData(Gallery::model()->findAll(), "id", "name"));
	echo TbHtml::Label(Yii::t('app','Dimenzije sličica'),'');
	echo TbHtml::createInput("textField","thumb_w","120",array('span'=>1,'prepend'=>'w'));
	echo TbHtml::createInput("textField","thumb_h","80",array('span'=>1,'prepend'=>'h'));
	echo TbHtml::Label(Yii::t('app','Broj slika'),'');
	echo TbHtml::createInput("textField","picture_count","9",array('span'=>1));
	
	
?>
