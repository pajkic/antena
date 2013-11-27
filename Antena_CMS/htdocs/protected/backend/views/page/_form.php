<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'page-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block"><?php echo Yii::t('app','Polja sa <span class="required">*</span> su obavezna.');?></p>
    <?php echo $form->errorSummary($model); ?>

            <?php echo $form->textFieldControlGroup($model,'name',array('span'=>5,'maxlength'=>255)); ?>

            <?php echo $form->hiddenField($model,'user_id',array('value'=>Yii::app()->user->id)); ?>

            <?php echo $form->hiddenField($model,'post_type_id',array('value'=>2)); ?>

            <?php echo $form->hiddenField($model,'term_id',array('value'=>0)); ?>

            <?php echo $form->dropDownListControlGroup($model,'parent_id',CHtml::listData(Post::model()->findAllByAttributes(array('post_type_id' => 2)), 'id', 'name'),array('empty'=>'Bez nadređene stranice')); ?>

            <?php echo $form->dropDownListControlGroup($model,'gallery_id',CHtml::listData(Gallery::model()->findAll(), 'id', 'name'),array('empty'=>'Bez galerije')); ?>

			<?php echo $form->textFieldControlGroup($model,'image', array('span'=>5,'maxlength'=>255,'id'=>'image', 'placeholder'=>'Kliknite da izaberete sliku')); ?>
            
            <?php echo Chtml::button('Ukloni sliku',array('id'=>'img_remove'));?>                        
            
            <?php echo $form->textFieldControlGroup($model,'guid',array('span'=>5,'maxlength'=>255)); ?>
            
			<?php echo $form->dropDownListControlGroup($model,'status',array('0'=>'Neobjavljena','1'=>'Objavljena')); ?>            
			
            <?php //echo $form->hiddenField($model,'created',array('span'=>5)); ?>

            <?php //echo $form->textFieldControlGroup($model,'modified',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->

<style type="text/css">
/*
#image {
    width: 200px;
    height: 200px;
    overflow: hidden;
    cursor: pointer;
    background: #000;
    color: #fff;
}
#image img {
    visibility: hidden;
}
*/
</style>


<script type="text/javascript">
/*
function openKCFinder(div) {
    window.KCFinder = {
        callBack: function(url) {
            window.KCFinder = null;
            div.innerHTML = '<div style="margin:5px">Loading...</div>';
            var img = new Image();
            img.src = url;
            img.onload = function() {
                div.innerHTML = '<div style="margin:5px"><img id="img" src="' + url + '" /></div>';
                $('#image_path').val(url);
                var img = document.getElementById('img');
  
                var o_w = img.offsetWidth;
                var o_h = img.offsetHeight;
                var f_w = div.offsetWidth;
                var f_h = div.offsetHeight;
                if ((o_w > f_w) || (o_h > f_h)) {
                    if ((f_w / f_h) > (o_w / o_h))
                        f_w = parseInt((o_w * f_h) / o_h);
                    else if ((f_w / f_h) < (o_w / o_h))
                        f_h = parseInt((o_h * f_w) / o_w);
                    img.style.width = f_w + "px";
                    img.style.height = f_h + "px";
                } else {
                    f_w = o_w;
                    f_h = o_h;
                }
                img.style.marginLeft = parseInt((div.offsetWidth - f_w) / 2) + 'px';
                img.style.marginTop = parseInt((div.offsetHeight - f_h) / 2) + 'px';
  
                img.style.visibility = "visible";
            }
        }
    };
    window.open('/kcfinder/browse.php?type=images&dir=users',
        'image_path', 'status=0, toolbar=0, location=0, menubar=0, ' +
        'directories=0, resizable=1, scrollbars=0, width=800, height=600'
    );
}
*/

$('#image').click(function(){

   		window.KCFinder = {};
    	window.KCFinder.callBack = function(url) {
    		$('#image').val(url);
        	window.KCFinder = null;
    	};
	    window.open('/kcfinder/browse.php?type=images',
	        'kcfinder_single', 'status=0, toolbar=0, location=0, menubar=0, ' +
	        'directories=0, resizable=1, scrollbars=0, width=800, height=600'
			);

});

$('#img_remove').click(function(){
	$('#image').val('');
})

</script>    
 