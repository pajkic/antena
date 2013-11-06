<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array(
	'About',
);
?>
<h1>About</h1>

alert sa funkcijom
<?php echo TbHtml::alert(TbHtml::ALERT_COLOR_WARNING, 'Lorem ipsum dolorem sit amet'); ?>


alert samo sa bootstrap klasom
<div class="alert alert-success">Lorem ipsum dolorem sit amet</div>

<p>This is a "static" page. You may change the content of this page
by updating the file <code><?php echo __FILE__; ?></code>.</p>
