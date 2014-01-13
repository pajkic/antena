<?php
/* @var $this PostController */
/* @var $model Post */

?>

<?php
$this->breadcrumbs=$breadcrumbs;
?>

<h1><?php echo $content['title'];?></h1>

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




	
