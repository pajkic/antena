<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<link rel="shortcut icon" href="/images/frontend/favicon.ico" />
	
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	<!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<link href='http://fonts.googleapis.com/css?family=Open+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<?php Yii::app()->bootstrap->register(); ?>
	<?php  
	  $baseUrl = Yii::app()->request->baseUrl; 
	  $cs = Yii::app()->getClientScript();
	  $cs->registerScriptFile($baseUrl.'/ddslick/jquery.ddslick.min.js');
	?>
	
</head>
<body>

<div class="container" id="page">
	
	<header>
		<hgroup>
			
		<?php $this->widget('application.extensions.widgets.langBox');?>		 	  

<div class="form-search">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'search-form',
	//'layout' => TbHtml::FORM_LAYOUTHORIZONTAL,
	'action' => '/site/search/lang/'.Yii::app()->language,
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
	)); ?>
	
	<?php echo TbHtml::textField('needle', '', array('placeholder' => Yii::t('app','Pretraži'))); ?>
	<?php echo TbHtml::submitButton(Yii::t('app','Pretraži'));?>

    <?php $this->endWidget(); ?>

</div><!-- form -->

		
		<?php $this->actionBlocks(1); ?> <!-- header blocks -->  	
		</hgroup>  	
	</header> <!-- header -->
	 
	<div id="main"> 		
		<div class="main_top">
			<?php $this->actionBlocks(2); ?> 
		</div><!-- main top blocks -->
					  						  		
		<div id="main_content">
			<?php if ($this->hasBlock(4)):?>
				<?php //var_dump($this->hasBlock(4));?>
			<aside class="span4">
				<?php $this->actionBlocks(4); ?>
			</aside> <!-- aside left blocks --> 
			<?php endif; ?>
			<?php if ($this->hasBlock(5)):?>				 	
			<aside class="span2"> 
				<?php $this->actionBlocks(5); ?>
			</aside> <!-- aside right blocks -->
			<?php endif; ?>	 	
			<div class="page_content">	
				<?php if ($this->hasBlock(3)):?> 	
				<div class="content_top">
					 <?php $this->actionBlocks(3); ?>
				</div> <!-- content top blocks -->						  			 	
				<?php endif; ?>		 
				<?php echo $content; ?>	
				<?php if ($this->hasBlock(6)):?>									
				<div class="content_bottom">
					<?php $this->actionBlocks(6); ?>
				</div> <!-- content bottom blocks -->		 
				<?php endif; ?>
  			</div>		
		</div> <!-- content -->		 		
		 	  		 
		 <!--	<?php if(isset($this->breadcrumbs)):?>  
		 	<?php $this->widget('zii.widgets.CBreadcrumbs', array(  
		 		'links'=>$this->breadcrumbs,  
		 	)); ?> -->
			<!-- breadcrumbs -->
		<!--	<?php endif?>  -->
			
		<!-- 	<?php echo $content; ?> -->
		<?php if ($this->hasBlock(7)):?>
		<div class="main_bottom">
			<?php $this->actionBlocks(7); ?>
		</div> <!-- main bottom blocks -->
		<?php endif; ?>
	</div> <!-- main -->	
	<footer>
		<?php if ($this->hasBlock(8)):?>
		<div class="f_blocks">
			<?php $this->actionBlocks(8); ?>
		</div>
		<?php endif; ?>
		<div class="modal-footer">
			Copyright &copy; <?php echo date('Y'); ?> ... | Developed by <a href="http://implementacija.rs/" target="_blank" title="Implementacija d.o.o.">Implementacija d.o.o.</a>
		</div>	
	</footer> <!-- footer -->
</div><!-- page -->

<script type="text/javascript">
	$(document).ready(function(){
		$('#search-form').submit(function(){
			var ss = $('#needle').val();
			if (ss.length < 3) return false;
		})
	})
	
</script>
</body>
</html>