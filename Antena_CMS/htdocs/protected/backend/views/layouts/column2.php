<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<section>
<div class="span-19">
		<?php echo $content; ?>	 
</div>
<div class="span-5 last">		
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>Yii::t('app','Akcije'),
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operations'),
		));
		$this->endWidget();
	?>
</div>
</section><!-- section -->
<?php $this->endContent(); ?>