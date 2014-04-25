<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array(
	'About',
);
?>
<h1>About</h1>


<h4>upozorenje i dugme sa Yiistrap funkcijom</h4>
<?php echo TbHtml::alert(TbHtml::ALERT_COLOR_WARNING, 'Lorem ipsum dolorem sit amet '); ?>
<?php echo TbHtml::button('Primary', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)); ?>


<h4>upozorenje i dugme samo sa bootstrap klasom</h4>
<div class="alert alert-warning alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		Lorem ipsum dolorem sit amet
</div>
<button type="button" class="btn btn-primary">Primary</button>


<h4>upozorenje i dugme sa bootstrap klasom spojeno i bez isključenja</h4>
<div class="alert alert-warning">
		Lorem ipsum dolorem sit amet		
		<button type="button" class="btn btn-primary">Primary</button>
</div>

<p>This is a "static" page. You may change the content of this page
by updating the file <code><?php echo __FILE__; ?></code>.</p>
