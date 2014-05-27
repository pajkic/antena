<?php
/* @var $this StateDescriptionController */
/* @var $model StateDescription */
?>

<?php
$this->breadcrumbs=array(
	'Države'=>array('/State/index'),
	$state->name=>array('/State/view','id'=>$state->id),
	Yii::t('app','Prevedi'),
);

$this->menu=array(
	array('label'=>Yii::t('app','Lista ') . 'Država', 'url'=>array('/State/index')),
	array('label'=>Yii::t('app','Kreiraj ') . 'Državu', 'url'=>array('/State/create')),
	array('label'=>Yii::t('app','Pregledaj ') . 'Državu', 'url'=>array('/State/view', 'id'=>$state->id)),
	array('label'=>Yii::t('app','Upravljaj ') . 'Državama', 'url'=>array('/State/admin')),
);
?>

    <h1>Prevedi državu <?php echo $state->name; ?></h1>
    
    
<?php 
	$this->widget('bootstrap.widgets.TbTabs', array(
    'tabs' => $tabs
    )); 
?>