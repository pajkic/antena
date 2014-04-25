<?php
echo Yii::t('app','Izaberite stranicu koja predstavlja sadržaj bloka');
echo TbHtml::dropDownListControlGroup("page_id","", CHtml::listData(Post::model()->findAllByAttributes(array('post_type_id'=>'2')), "id", "name"));	
echo TbHtml::Label(Yii::t('app','Prikaži naslov'),'');
echo TbHtml::checkBox('title','checked');

?>
