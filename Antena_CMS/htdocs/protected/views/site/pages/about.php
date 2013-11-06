<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - About';
$this->breadcrumbs=array(
	'About',
);
?>
<h1>About</h1>


<p>alert sa funkcijom</p>
<?php echo TbHtml::alert(TbHtml::ALERT_COLOR_WARNING, 'Lorem ipsum dolorem sit amet'); ?>


<p>alert samo sa bootstrap klasom</p>
<div class="alert alert-warning alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		Lorem ipsum dolorem sit amet
</div>

<p>This is a "static" page. You may change the content of this page
by updating the file <code><?php echo __FILE__; ?></code>.</p>
