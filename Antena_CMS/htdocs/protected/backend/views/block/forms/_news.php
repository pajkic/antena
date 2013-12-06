<?php 
	
	
	echo TbHtml::Label(Yii::t('app','Kategorije'),'');
	echo TbHtml::checkBoxList('terms[]', $terms['id'], $terms['name']);
//	echo TbHtml::dropDownListControlGroup("gallery_id","", CHtml::listData(Gallery::model()->findAll(), "id", "name"));
	echo TbHtml::Label(Yii::t('app','Broj članaka'),'');
	echo TbHtml::createInput("textField","post_count","5",array('span'=>1));
	echo TbHtml::Label(Yii::t('app','Sa slikom'),'');
	echo TbHtml::checkBox('image','checked');
	
	
?>

<script type="text/javascript">
		$('#block-form').submit(function(){
		//var options = new String;
		//options = "{";
		var options = new Object();
		var terms = new Array();
		
		$("#opts :input").each(function() {
			
			switch(this.type) {
				case 'checkbox':
					if (this.name="terms" && this.checked) terms.push(this.value);
					if (this.name="image" && this.checked) {
						options['image'] = "1";
					} else {
						options['image'] = "0";
					}
					break;
				default:
					options[this.name] = this.value;
					break;
			}
			
		});
		options['terms'] = terms;
		$('#Block_options').val(JSON.stringify(options));
	})
</script>