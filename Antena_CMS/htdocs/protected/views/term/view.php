<?php
/* @var $this PostController */
/* @var $model Post */

?>

<?php
$this->breadcrumbs=$breadcrumbs;
?>

<h1><?php echo $content['title'];?></h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$posts,
	'itemView'=>'_view',
)); ?>





	
