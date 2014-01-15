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

<!-- mapa sajta -->
<!--	
	<a class="sitemap_icon" href="/post/79/Mapa+sajta/lang/en"><img src="/images/frontend/sitemap.jpg" /></a>
	<a class="sitemap_icon" href="/post/79/Mapa+sajta/lang/sr"><img src="/images/frontend/sitemap.jpg" /></a>
	<a class="sitemap_icon" href="/post/79/Mapa+sajta/lang/hr"><img src="/images/frontend/sitemap.jpg" /></a> 
-->

<!-- logo -->
<!--	
 	<a class="cross_border_logo" href="/lang/en" title="Croatia-Serbia - Cross-Border Cooperation for Investment Promotion"><img src="/images/frontend/croatia-serbia-cross-border-cooperation-for-investment-promotion-en.png" alt="Croatia-Serbia - Cross-Border Cooperation for Investment Promotion" /></a>
 	<a class="cross_border_logo" href="/lang/sr" title="Hrvatska-Srbija - Prekogranična saradnja za promociju investicija"><img src="/images/frontend/croatia-serbia-cross-border-cooperation-for-investment-promotion-hr-sr.png" alt="Hrvatska-Srbija - Prekogranična saradnja za promociju investicija" /></a>
 	<a class="cross_border_logo" href="/lang/hr" title="Hrvatska-Srbija - Prekogranična suradnja za poticanje ulaganja"><img src="/images/frontend/croatia-serbia-cross-border-cooperation-for-investment-promotion-hr-sr.png" alt="Hrvatska-Srbija - Prekogranična suradnja za poticanje ulaganja" /></a> 
-->

<!-- disclaimer  -->
<!--
	<div class="disclaimer"><img src="/images/frontend/eu-en.jpg" /> 
		<p>The European Union is made up of 28 Member States who have decided to gradually link together their know-how, resources and destinies. Together, during a period of enlargement of 50 years, they have built a zone of stability, democracy and sustainable development whilst maintaining cultural diversity, tolerance and individual freedoms. The European Union is committed to sharing its achievements and its values with countries and peoples beyond its borders”. The European Commission is the EU’s executive body.</p>
		<p>A project implemented by NALED and Municipality of Gradiste in partnership with Municipality of Lovas, City of Ilok, TINTL, Municipality of Odzaci and Municipality of Kula.</p>
	</div>
	<div class="disclaimer"><img src="/images/frontend/eu-sr.jpg" /> 
		<p>Evropska unija se sastoji od 28 zemalja članica koje su odlučile da postepeno povezuju svoja znanja, resurse i sudbine. Tokom 50 godina proširenja, zajedno su izgradile zonu stabilnosti, demokratije i održivog razvoja, istovremeno zadržavajući kulturne različitosti, toleranciju i lične slobode. Evropska unija je posvećena tome da svoja dostignuća i vrednosti deli sa zemljama i ljudima van svojih granica. Evropska komisija je Izvršno telo EU.</p>
		<p>Projekat sprovode NALED i Opština Gradište u partnerstvu sa Opštinom Lovas, gradom Ilokom i Uredom za međunarodnu saradnju TINTL sa hrvatske strane i opštinama Odžaci i Kula sa srpske strane.</p>
	</div>	
	<div class="disclaimer"><img src="/images/frontend/eu-hr.jpg" /> 
		<p>Europska unija se sastoji od 28 zemalja članica koje su odlučile postepeno povezivati svoja znanja, resurse i sudbine. Tijekom 50 godina proširenja, zajedno su izgradile zonu stabilnosti, demokracije i održivog razvoja, istovremeno zadržavajući kulturne različitosti, toleranciju i osobnu slobodu. Europska unija je posvećena tome da svoja dostignuća i vrijednosti dijeli sa zemljama i ljudima van svojih granica. Europska komisija je izvršno tijelo EU.</p>
		<p>Projekt provode NALED i Općina Gradište u partnerstvu sa Općinom Lovas, Gradom Ilokom i Uredom za međunarodnu suradnju TINTL sa hrvatske strane i općinama Odžaci i Kula sa srpske strane.</p>
	</div>			
-->

<!-- partneri na projektu  -->
<!-- 
	<div class="partneri">
		Partneri na projektu
		<a href="#" target="_blank"><img src="" /></a>
	</div>
	<div class="partneri">
		Partneri na projektu
		<a href="#" target="_blank"><img src="" /></a>
	</div>
	<div class="partneri">
		Project partners
		<a href="#" target="_blank"><img src="" /></a>
	</div>
-->
</body>
</html>