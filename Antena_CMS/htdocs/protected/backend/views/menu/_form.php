<?php
/* @var $this MenuController */
/* @var $model Menu */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'menu-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block"><?php echo Yii::t('app','Polja sa <span class="required">*</span> su obavezna.');?></p>
    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->textFieldControlGroup($model,'name',array('span'=>5,'maxlength'=>255)); ?>

			<?php echo $form->dropDownListControlGroup($model,'parent_id', CHtml::listData(Menu::model()->findAll(), 'id', 'name'),array('empty'=>'Bez nadređenog menija')); ?>            
            
            <?php echo $form->textFieldControlGroup($model,'sort',array('span'=>1,'maxlength'=>10)); ?>

            <?php echo $form->hiddenField($model,'level',array('value'=>0)); ?>

			<?php echo $form->dropDownListControlGroup($model,'type', array('anchor'=>'Sidro','page' => 'Stranica','term' => 'Kategorija', 'post' => 'Članak', 'link' => 'Link')); ?>
			
			<div id="menu_item_content">
            
            <?php echo $form->dropDownListControlGroup($model,'content', CHtml::listData(Post::model()->findAllByAttributes(array('post_type_id'=>2)), 'id', 'name')); ?>
			
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
	$(document).ready(function(){
		var type = $('#Menu_type').val();
		setContent(type);
	});
	$('#Menu_type').change(function(){
		var type = $('#Menu_type').val();
		setContent(type);
	});
	
	function setContent(type) {
		switch (type) {
			case 'page':
				var ccontent='<?php echo preg_replace( "/\r|\n/", "", $form->dropDownListControlGroup($model,"content", CHtml::listData(Post::model()->findAllByAttributes(array("post_type_id"=>2)), "id", "name"))); ?>';
				break;
			case 'term':
				var ccontent='<?php echo preg_replace( "/\r|\n/", "", $form->dropDownListControlGroup($model,"content", CHtml::listData(Term::model()->findAll(), "id", "name"))); ?>';
				break;
			case 'post':
				var ccontent='<?php echo preg_replace( "/\r|\n/", "", $form->dropDownListControlGroup($model,"content", CHtml::listData(Post::model()->findAllByAttributes(array("post_type_id"=>1)), "id", "name"))); ?>';
				break;
			case 'link':
				var ccontent='<?php  echo preg_replace( "/\r|\n/", "", $form->textFieldControlGroup($model,"content",array("prepend"=>"http://", "span"=>5,"maxlength"=>255))); ?>';
				break;
			case 'anchor':
				var ccontent='<?php  echo $form->textFieldControlGroup($model,"content",array("span"=>5,"maxlength"=>255)); ?>';
				break;
			default:
				break;			
		}
		$('#menu_item_content').html(ccontent);

	}
	
</script>

