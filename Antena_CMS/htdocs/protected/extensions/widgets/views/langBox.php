<div id="lang">

<select id="languages" name="_lang">
	<?php foreach ($languages as $language): ?>
	 <option value="<?php echo $language['lang'];?>" data-imagesrc="/images/backend/languages/<?php echo $language['flag'];?>" <?php echo ($language['lang']==Yii::app()->language) ? 'selected' : '';?>> <?php echo $language['title'];?></option>
	 <?php endforeach; ?>	
</select>

</div>

<script type="text/javascript">
	$(document).ready(function(){
	$('#languages').ddslick({
    onSelected: function(data){
    	var lang = data.selectedData.value;
    	var url = document.URL;
    	var first = url.indexOf('lang') + 5;
    	if (first > 4) {
	    	var newurl = url.substr(0,first)+lang+url.substr(first+2,url.length);
	    	
    	} else {
    		var newurl = url+'lang/'+lang;
    	}
    	if (newurl !== url) window.location=newurl;
    }   
});
	});
</script>