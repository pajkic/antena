<?php
echo Yii::t('app','Dodaj blok');
echo TbHtml::dropDownListControlGroup("block_id","", CHtml::listData(Block::model()->findAll(), "id", "name"));
echo TbHtml::link(Yii::t('app','Dodaj'),"javascript:void(0);",array("id"=>"add_block"));
echo TbHtml::textAreaControlGroup("acc_block","",array("id"=>"acc_block","rows"=>"10"));	
echo TbHtml::textAreaControlGroup("acc_block_id","",array("id"=>"acc_block_id", 'class'=>'hidden'));
?>
<script type="text/javascript">
	$('#add_block').click(function(){
		cm = $('#acc_block').val();
		cmi = $('#acc_block_id').val();
		cm = cm + $('#block_id').find('option:selected').text() +'\n';
		cmi = cmi + '"'+$('#block_id').val()+'",';
		$('#acc_block').val(cm);
		$('#acc_block_id').val(cmi);  
	})
</script>
