<?php
/* @var $this GalleryItemDescriptionController */
/* @var $model GalleryItemDescription */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>5)); ?>
                    <?php echo $form->textFieldControlGroup($model,'gallery_item_id',array('span'=>5)); ?>
                    <?php echo $form->textFieldControlGroup($model,'language_id',array('span'=>5)); ?>
                    <?php echo $form->textFieldControlGroup($model,'title',array('span'=>5,'maxlength'=>255)); ?>
                    <?php echo $form->textAreaControlGroup($model,'description',array('rows'=>6,'span'=>8)); ?>

        <?php echo TbHtml::submitButton('Traži',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->