<h2><?php echo Yii::t('app','Rezultati pretrage');?> ("<?php echo $_POST['needle'];?>"):</h2>

<? if ($post_count !== '0'): ?>
<?php 
 $this->widget('zii.widgets.CListView', array(
	'dataProvider' => $posts,
	'itemView' => '/term/_view',
	'ajaxUpdate'=>false,
	'enablePagination'=>false,
	'pagerCssClass' => 'result-list',
	'summaryText' => '',
	'emptyText' => ''
));
/*
$this->widget('CLinkPager', array(
	'header' => '',
	'firstPageLabel' => '&lt;&lt;',
	'prevPageLabel' => '&lt;',
	'nextPageLabel' => '&gt;',
	'lastPageLabel' => '&lt;&lt;',
	'pages' => $pages,
));
 * 
 */
?>

<?php else: ?>
	<h3><?php echo Yii::t('app','Ništa nije pronađeno');?>.</h3>
<?php endif; ?>
