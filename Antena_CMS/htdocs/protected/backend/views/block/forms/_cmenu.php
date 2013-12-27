<?php

echo Yii::t('app','Dodaj stavku u meni');

echo TbHtml::dropDownListControlGroup("post_id","", $items);
echo TbHtml::link(Yii::t('app','Dodaj'),"javascript:void(0);",array("id"=>"add_post"));
echo TbHtml::textAreaControlGroup("custom_menu","",array("id"=>"custom_menu","rows"=>"10"));	
echo TbHtml::textAreaControlGroup("custom_menu_id","",array("id"=>"custom_menu_id", 'class'=>'hidden'));
?>
<script type="text/javascript">
	$('#add_post').click(function(){
		cm = $('#custom_menu').val();
		cmi = $('#custom_menu_id').val();
		cm = cm + $('#post_id').find('option:selected').text() +'\n';
		cmi = cmi + '"'+$('#post_id').val()+'",';
		$('#custom_menu').val(cm);
		$('#custom_menu_id').val(cmi);  
	})
</script>
