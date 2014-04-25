<?php
echo Yii::t('app','Izaberite galeriju koja predstavlja sadržaj bloka');
echo TbHtml::dropDownListControlGroup("gallery_id","", CHtml::listData(Gallery::model()->findAll(), "id", "name"));	
?>