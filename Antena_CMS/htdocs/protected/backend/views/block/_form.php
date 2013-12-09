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

			<?php if (!$model->id):?>
            <?php echo $form->dropDownListControlGroup($model,'block_type_id', CHtml::listData(BlockType::model()->findAll(), 'id', 'name')); ?>	
			
            <?php echo $form->textAreaControlGroup($model,'options',array('rows'=>6,'span'=>8, 'class'=>'hidden')); ?>
            <?php //echo $form->textFieldControlGroup($model,'created',array('span'=>5)); ?>
            <?php //echo $form->textFieldControlGroup($model,'updated',array('span'=>5)); ?>
            <?php echo $form->hiddenField($model,'user_id',array('value'=>Yii::app()->user->id)); ?>
			<div id="opts">
			
			</div>
			<?php endif; ?>
 
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Snimi' : 'Snimi',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>

    <?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
	$(document).ready(function(){
		var type = $('#Block_block_type_id').val();
		setContent(type);
		
	});

	$('#Block_block_type_id').change(function(){
		var type = $(this).val();
		setContent(type);
	});

	$('#block-form').submit(function(){
		
		var type = $('#Block_block_type_id').val();
		switch(type) {

			case "1":

			news = {};
			news.options = new Object();
			news.options['image']="0";
			news.options['date']="0";
			news.options['excerpt']="0";
			terms = new Array();
						
			$("#opts :input").each(function() {
				
				switch(this.type) {
					case 'checkbox':
						if (this.name.substr(0,5)=="terms" && this.checked) terms.push(this.value);
						if (this.name=="image" && this.checked) {
							news.options['image'] = "1";
						} 
						if (this.name=="excerpt" && this.checked) {
							news.options['excerpt'] = "1";
						} 
						if (this.name=="date" && this.checked) {
							news.options['date'] = "1";
						} 

						break;
					default:
						news.options[this.name] = this.value;
						break;
				}
				
			});
			news.options['terms'] = terms;
			$('#Block_options').val(JSON.stringify(news.options));
			break;
			
			case "2":
			
			gallery={};
			gallery.options = new Object();
			params = new Array();
			$("#opts :input").each(function() {
				switch(this.type) {
					case 'checkbox':
						if (this.checked) params.push(this.value);
						break;
					default:
						gallery.options[this.name] = this.value;
						break;
				}
			});
			gallery.options['galleries'] = params;
			$('#Block_options').val(JSON.stringify(gallery.options));
			break;
			
			case "6":
			
			custom = {};
			custom.options = new Object();
			$("#opts :input").each(function() {
				
				switch(this.type) {
					case 'checkbox':
						if (this.name=="title" && this.checked) {
							custom.options['title'] = "1";
						} else {
							custom.options['title'] = "0";
						}
						break;
					default:
						custom.options[this.name] = this.value;
						break;
				}
			});
			
			$('#Block_options').val(JSON.stringify(custom.options));	
			
			case "7":
			ids = $('#custom_menu_id').val();
			ids = ids.substr(0,ids.length-1);
			jstring = '['+ids+']';
			$('#Block_options').val(jstring);				
			break;
			default:
			break;
		}
		
	});
	
	function setContent(type) { 
	
		
		$('#opts').html('');
		$('#Block_options').val('');
		$.ajax({
			'url': '<?php echo Yii::app()->baseUrl . "/backend.php/Block/options/ajax";?>',
			'type': 'post',
			'data': {
				'type': type,
					},
			'success':function(data){
				$('#opts').html(data);
			}
		});
	}
</script>
