<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="sr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="sr" />
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
	<link href='http://fonts.googleapis.com/css?family=Pathway+Gothic+One&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<?php Yii::app()->bootstrap->register(); ?>
	<?php  
	  $baseUrl = Yii::app()->request->baseUrl; 
	  $cs = Yii::app()->getClientScript();
	  $cs->registerScriptFile($baseUrl.'/ddslick/jquery.ddslick.min.js');
	?>
	<meta name="keywords" content="IsoTeck">
	<meta name="description" content="IsoTeck" />
</head>
<body id="body_<? echo (isset($_GET['id'])) ? $_GET['id'] : '';?>">

<div class="container" id="page">	
	
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<header> 			 			
				<!-- logo -->
					<?php include('html_blocks/' . Yii::app()->language . '/logo.php'); ?>		
				<!-- <?php $this->widget('application.extensions.widgets.langBox2');?> -->		 	 
					<?php $this->actionBlocks(1); ?> <!-- header blocks -->  						   	
			</header> <!-- header -->	 
		</div>
	</div>

		<?php $this->actionBlocks(2); ?> <!-- main top blocks -->		
	
	<div class="row">
		<div class="col-lg-2 col-md-2 col-sm-2 content_left">
			<?php if ($this->hasBlock(4)):?>
				<?php //var_dump($this->hasBlock(4));?>
				<?php $this->actionBlocks(4); ?>  
			<?php endif; ?> <!-- aside left blocks --> 
			
			<div class="baneri"> <?php include('html_blocks/' . Yii::app()->language . '/baneri.php'); ?></div>		
			
		</div>
		<div class="col-lg-10 col-md-10 col-sm-10 content_right">
			
			<?php if ($this->hasBlock(3)):?> 	
				<?php $this->actionBlocks(3); ?>  				  			 	
			<?php endif; ?>	<!-- content top blocks -->	
				
			<?php echo $content; ?>	 <!-- main content -->	
			
			<?php if ($this->hasBlock(5)):?>				 	
				<?php $this->actionBlocks(5); ?>
			<?php endif; ?>	<!-- aside right blocks -->
		
			<?php if ($this->hasBlock(6)):?>									
				<?php $this->actionBlocks(6); ?> 	 
			<?php endif; ?> <!-- content bottom blocks -->	
		</div>		
	</div>	 
	
	<?php if ($this->hasBlock(7)):?>
		<?php $this->actionBlocks(7); ?>	 
	<?php endif; ?> <!-- main bottom blocks -->
	 
	<footer>
		<?php if ($this->hasBlock(8)):?>
		<?php $this->actionBlocks(8); ?>
		<?php endif; ?>  <!-- footer blocks -->
			
		<div class="panel-footer">
			<small> <?php include('html_blocks/' . Yii::app()->language . '/copyright.php'); ?> </small>
		</div>	
	</footer> <!-- footer --> 				 			 		 
 	
</div><!-- container -->
</body>
</html>