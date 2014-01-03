<div class="form-search">
		
		    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
			'id'=>'search-form',
			//'layout' => TbHtml::FORM_LAYOUTHORIZONTAL,
			'action' => '/Search/Results/lang/'.Yii::app()->language,
			// Please note: When you enable ajax validation, make sure the corresponding
			// controller action is handling ajax validation correctly.
			// There is a call to performAjaxValidation() commented in generated controller code.
			// See class documentation of CActiveForm for details on this.
			'enableAjaxValidation'=>true,
			)); ?>
			
			<?php echo TbHtml::textField('needle', '', array('placeholder' => Yii::t('app',' '))); ?>
			<?php echo TbHtml::submitButton(Yii::t('app',' '));?>
		
		    <?php $this->endWidget(); ?>
		
		</div><!-- form -->

<script type="text/javascript">
	$(document).ready(function(){
		$('#search-form').submit(function(){
			var ss = $('#needle').val();
			if (ss.length < 3) return false;
		})
	})
	
</script>