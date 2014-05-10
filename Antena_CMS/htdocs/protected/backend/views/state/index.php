<?php
/* @var $this LanguageController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Države',
);

$this->menu=array(
	array('label'=>Yii::t('app','Kreiraj državu'),'url'=>array('create')),
	//array('label'=>Yii::t('app','Upravljaj jezicima'),'url'=>array('admin')),
);
?>



<h1>Države</h1>

<?php /* $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); */ ?>

	
    
    <?php $this->widget('bootstrap.widgets.TbGridView', array(
    'dataProvider' => $dataProvider,
    
    'template' => "{items}\n{pager}",
    'columns' => array(
    array(
    'name' => 'id',
    'header' => '#',
    'htmlOptions' => array('color' =>'width: 60px'),
    ),
    array(
    'name' => 'name',
    'header' => 'Naziv',
    'type' => 'raw',
    'value'=>'CHtml::link($data["name"],Yii::app()->createUrl("state/update", array("id"=>$data["id"])))',
    ),
    array(
    'name' => 'state',
    'header' => 'Skraćeni naziv',
    ),
    array(
    'name' => 'flagpath',
    'header' => 'Zastavica',
    'type' => 'raw',
    'value' =>  'CHtml::image("../../images/backend/states/".$data->flagpath)',
    ),
	array(
    'name' => 'active',
    'type' => 'raw',
    'value'=>'CHtml::checkBox("active[]",$data->active,array("value"=>$data->id,"id"=>"active_".$data->id,"class"=>"state_active"))',
    'header' => 'Aktivan',
    ),
    array(
    'name' => 'main',
    'type' => 'raw',
    'value'=>'CHtml::radioButton("main[]",$data->main,array("value"=>$data->id,"id"=>"main_".$data->id,"class"=>"state_main"))',
    'header' => 'Osnovna',
    ),
    array(
	'class'=>'bootstrap.widgets.TbButtonColumn',
	),
    ),
    )); ?>
    <div id='AjFlash' class="flash-success" style="display:none"></div>
    
<script type="text/javascript">
	$('.state_active').click(function(){
		var state_id = this.id.substr(7);
		
		var active=this.checked;
		if (active) { a=1 } else { a=0 }
		
		
		$.ajax({
			'type': 'post',
			'url': '/backend.php/State/setActive/'+state_id,
			'data': {"active" : a},
			'success': function(data) {
				$('#AjFlash').html(data).fadeIn().animate({opacity: 1.0}, 3000).fadeOut('slow');
				
			}
		});
	});
	
	$('.state_main').click(function(){
		
		var state_id = this.id.substr(5);
				
		$.ajax({
			'type': 'post',
			'url': '/backend.php/State/setMain/'+state_id,
			'success': function(data) {
				$('#AjFlash').html(data).fadeIn().animate({opacity: 1.0}, 3000).fadeOut('slow');
			}
		});
	});
</script>