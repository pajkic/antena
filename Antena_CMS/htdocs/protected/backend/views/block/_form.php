<?php
/* @var $this BlockController */
/* @var $model Block */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'block-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block"><?php echo Yii::t('app','Polja sa <span class="required">*</span> su obavezna.');?></p>
    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->textFieldControlGroup($model,'name',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->dropDownListControlGroup($model,'block_position_id', CHtml::listData(BlockPosition::model()->findAll(), 'id', 'name')); ?>

            <?php echo $form->dropDownListControlGroup($model,'status_id', CHtml::listData(BlockStatus::model()->findAll(), 'id', 'name')); ?>

            <?php echo $form->dropDownListControlGroup($model,'block_type_id', CHtml::listData(BlockType::model()->findAll(), 'id', 'name')); ?>	

            <?php echo $form->textAreaControlGroup($model,'options',array('rows'=>6,'span'=>8, 'class'=>'hidden')); ?>
            <?php //echo $form->textFieldControlGroup($model,'created',array('span'=>5)); ?>
            <?php //echo $form->textFieldControlGroup($model,'updated',array('span'=>5)); ?>
            <?php echo $form->hiddenField($model,'user_id',array('value'=>Yii::app()->user->id)); ?>
			<div id="opts">
				
			</div>
        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
	$('#Block_block_type_id').change(function(){
		var type = $(this).val();
		$.ajax({
			'url': '<?php echo Yii::app()->baseUrl . "/backend.php/Block/options/ajax";?>',
			'type': 'post',
			'data': {
				'type': type
			},
			'success':function(data){
				$('#opts').html(data);
			}
		})
	});
	
	$('#block-form').submit(function(){
		var options = new String;
		options = "{";
		$("#opts :input").each(function() {
			options += '"'+this.name+'" :'+this.value+","
    		
		});
		options = options.substring(0,options.length - 1);
		options += "}";
		$('#Block_options').val(options);

	})
</script>
