<?php
/* @var $this PostController */
/* @var $model Post */

?>

<?php
$this->breadcrumbs=$breadcrumbs;
?>

<div class="excerpt_image">
<?php if (strlen($term['image']) > 0): ?>	
	<?php if (Yii::app()->setting->getValue('term_image')=='yes'): ?>	
		<img class="img-responsive" src="<?php echo $term['image'];?>">		 
	<?php endif; ?>
<?php endif; ?> 
</div>

<div class="main_content">
	<h1><?php echo $content['title'];?></h1>
</div>

<?php if ($term['excerpt']>0):?>
	<p>
		<?php echo $content['excerpt'];?>;
	</p>	
<?php endif; ?>

<?php 
 $this->widget('zii.widgets.CListView', array(
	'dataProvider' => $posts,
	'itemView' => '_view',
	'ajaxUpdate'=>false,
	'enablePagination'=>false,
	'pagerCssClass' => 'result-list',
	'summaryText' => '',
	'emptyText' => ''
));
$this->widget('CLinkPager', array(
	'header' => '',
	'firstPageLabel' => '&lt;&lt;',
	'prevPageLabel' => '&lt;',
	'nextPageLabel' => '&gt;',
	'lastPageLabel' => '&lt;&lt;',
	'pages' => $pages,
));
?>



	
