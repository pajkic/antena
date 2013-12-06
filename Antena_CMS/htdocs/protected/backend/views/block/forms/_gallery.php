<?php 
	
	
	echo TbHtml::Label(Yii::t('app','Galerije'),'');
	echo TbHtml::checkBoxList('galleries[]', $galleries['id'], $galleries['name']);
//	echo TbHtml::dropDownListControlGroup("gallery_id","", CHtml::listData(Gallery::model()->findAll(), "id", "name"));
	echo TbHtml::Label(Yii::t('app','Dimenzije sličica'),'');
	echo TbHtml::createInput("textField","thumb_w","120",array('span'=>1,'prepend'=>'w'));
	echo TbHtml::createInput("textField","thumb_h","80",array('span'=>1,'prepend'=>'h'));
	echo TbHtml::Label(Yii::t('app','Broj slika'),'');
	echo TbHtml::createInput("textField","picture_count","9",array('span'=>1));
	
	
?>

<script type="text/javascript">
		$('#block-form').submit(function(){
		//var options = new String;
		//options = "{";
		var options = new Object();
		var params = new Array();
		$("#opts :input").each(function(i,ei,zz) {
			if (this.type == 'checkbox' && this.checked) {
				
				params.push(this.value);
			} else {
				options[this.name] = this.value;
			}   		
		});
		options['galleries'] = params;
		$('#Block_options').val(JSON.stringify(options));
		alert(JSON.stringify(options));
		return false;
	})
</script>