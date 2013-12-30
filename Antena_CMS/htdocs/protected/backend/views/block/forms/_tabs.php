<?php
echo Yii::t('app','Dodaj blok');
echo TbHtml::dropDownListControlGroup("block_id","", CHtml::listData(Block::model()->findAll(), "id", "name"));
echo TbHtml::link(Yii::t('app','Dodaj'),"javascript:void(0);",array("id"=>"add_block"));
echo TbHtml::textAreaControlGroup("tab_block","",array("id"=>"tab_block","rows"=>"10"));	
echo TbHtml::textAreaControlGroup("tab_block_id","",array("id"=>"tab_block_id", 'class'=>'hidden'));
?>
<script type="text/javascript">
	$('#add_block').click(function(){
		cm = $('#tab_block').val();
		cmi = $('#tab_block_id').val();
		cm = cm + $('#block_id').find('option:selected').text() +'\n';
		cmi = cmi + '"'+$('#block_id').val()+'",';
		$('#tab_block').val(cm);
		$('#tab_block_id').val(cmi);  
	})
</script>
