<?php
/* @var $this UserController */
/* @var $model User */
?>

<?php
$this->breadcrumbs=array(
	'Korisnici'=>array('index'),
	$model->display_name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista korisnika', 'url'=>array('index')),
	array('label'=>'Kreiraj korisnika', 'url'=>array('create')),
	array('label'=>'Pregledaj korisnika', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Upravljaj korisnicima', 'url'=>array('admin')),
);
?>

    <h1>Update User <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>