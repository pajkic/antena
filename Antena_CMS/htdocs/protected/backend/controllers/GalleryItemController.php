<?php

class GalleryItemController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			//'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model = $this->loadModel($id);
		$image = '/uploads/gallery/'.$model->attributes['gallery_id'].'/'.$model->attributes['name'];
		$description = GalleryItemDescription::model()->findByAttributes(array('gallery_item_id'=> $model->attributes['id']));
		$this->render('view',array(
			'model'=>$model,
			'image'=>$image,
			'description'=>$description,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	

	{
		$model=new GalleryItem;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['GalleryItem'])) {
			$model->attributes=$_POST['GalleryItem'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['GalleryItem'])) {
			$model->attributes=$_POST['GalleryItem'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if (Yii::app()->request->isPostRequest) {
			
			$file = GalleryItem::model()->findByPk($id);
			
			if (is_file(Yii::app()->basePath.'/../uploads/gallery/'.$file->gallery_id.'/'.$file->name))	unlink(Yii::app()->basePath.'/../uploads/gallery/'.$file->gallery_id.'/'.$file->name);
			
			
			if (is_file(Yii::app()->basePath.'/../uploads/gallery/'.$file->gallery_id.'/thumbs/'.$file->name)) unlink(Yii::app()->basePath.'/../uploads/gallery/'.$file->gallery_id.'/thumbs/'.$file->name);
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax'])) {
				$this->redirect('/backend.php/gallery/'.$file->gallery_id);
				//$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			}
			
		} else {
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('GalleryItem');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new GalleryItem('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['GalleryItem'])) {
			$model->attributes=$_GET['GalleryItem'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	public function actionUpload()
	{
		$model=new GalleryItem;
		

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		
        if(isset($_FILES['file_name']))
        {
        	
        	$languages = Language::model()->findAllByAttributes(array('active'=>1));
			
			
        	
        	$attributes  = array(
			'gallery_id' => $_GET['gallery_id'],
			'name' => $_GET['file_name'],
			);
            $model->attributes=$attributes;
			
            try {
            	$model->save();
            
            	if (!is_dir(Yii::app()->basePath.'/../uploads/gallery/'.$_GET['gallery_id'])) {
            		mkdir(Yii::app()->basePath.'/../uploads/gallery/'.$_GET['gallery_id'],0777);
					mkdir(Yii::app()->basePath.'/../uploads/gallery/'.$_GET['gallery_id'].'/thumbs',0777);
            	}
            	move_uploaded_file($_FILES['file_name']['tmp_name'], Yii::app()->basePath.'/../uploads/gallery/'.$_GET['gallery_id'].'/'.$_FILES['file_name']['name']);
                $thumbnail = array(
					'url' => Yii::app()->basePath.'/../uploads/gallery/'.$_GET['gallery_id'].'/'.$_FILES['file_name']['name'],
					'savePath' => Yii::app()->basePath.'/../uploads/gallery/'.$_GET['gallery_id'].'/thumbs/'.$_FILES['file_name']['name'],
					'box_w' => Yii::app()->setting->getValue('thumbnail_size'),
					'box_h' => Yii::app()->setting->getValue('thumbnail_size'),
					/*
					'r' => 230,
					'g' => 230,
					'b' => 230
					 */ 
					
				);
				$this->makeThumb($thumbnail);
                //$gallery->image->saveAs('uploads/gallery/');
                // redirect to success page
            	foreach($languages as $language) {
            		$description = new GalleryItemDescription;
            		$description->attributes =  array(
            		'gallery_item_id' => $model->primaryKey,
            		'language_id'=>$language['id'],
            		'title'=>'',
            		'description'=>''
					);
					
					$description->save();
            	} 
				   
                echo json_encode(array('success'=>'true','filename'=>$_FILES['file_name']['name']));
            } 
            catch (Exception $e) {
            	echo 'Error!';
            }
        } 
	}


	private function makeThumb( $thumbnail ){
		$srcFile = $thumbnail['url'];
		$thumbFile = $thumbnail['savePath'];
		$thumbSize = $thumbnail['box_w'];
		$filename = $srcFile;	
		  /* Determine the File Type */
		  $type = substr( $filename , strrpos( $filename , '.' )+1 );
		 /* Create the Source Image */
		  switch( $type ){
		    case 'jpg' : case 'jpeg' :
		  $src = imagecreatefromjpeg( $srcFile ); break;
		case 'png' :
		  $src = imagecreatefrompng( $srcFile ); break;
		case 'gif' :
		      $src = imagecreatefromgif( $srcFile ); break;
		  }
		 /* Determine the Image Dimensions */
		  $oldW = imagesx( $src );
		  $oldH = imagesy( $src );
		 /* Calculate the New Image Dimensions */
		  if( $oldH > $oldW ){
		   /* Portrait */
		    $newW = $thumbSize;
		    $newH = $oldH * ( $thumbSize / $oldW );
		  }else{
		   /* Landscape */
		    $newH = $thumbSize;
		    $newW = $oldW * ( $thumbSize / $oldH );
		  }
		 /* Create the New Image */
		  $new = ImageCreateTrueColor( $thumbSize , $thumbSize );
		 /* Transcribe the Source Image into the New (Square) Image */
		  ImagecopyResampled( $new , $src , 0 , 0 , ( $newW - $thumbSize)/2 , ( $newH - $thumbSize)/2 , $newW , $newH , $oldW, $oldH );
		  switch( $type ){
		    case 'jpg' : case 'jpeg' :
		  imagejpeg( $new , $thumbFile ); break;
		case 'png' :
		  imagepng( $new , $thumbFile ); break;
		case 'gif' :
		  imagegif( $new , $thumbFile ); break;
		  }
		  ImageDestroy( $new );
		  ImageDestroy( $src );
		  
	}

	
	private function resize($p){
		
		$background = ImageCreateTrueColor($p['box_w'], $p['box_h']);
		$color=imagecolorallocate($background, $p['r'], $p['g'], $p['b']);
		imagefill($background, 0, 0, $color);
		$image = $this->open_image($p['url'], $p['r'], $p['g'], $p['b']);
		if ($image === false) { die ('Unable to open image'); }
		$w = imagesx($image);
		$h = imagesy($image);
		$ratio=$w/$h;
		$target_ratio=$p['box_w']/$p['box_h'];
		if ($ratio>$target_ratio){
			$new_w=$p['box_w'];
			$new_h=round($p['box_w']/$ratio);
			$x_offset=0;
			$y_offset=round(($p['box_h']-$new_h)/2);
		}else {
			$new_h=$p['box_h'];
			$new_w=round($p['box_h']*$ratio);
			$x_offset=round(($p['box_w']-$new_w)/2);
			$y_offset=0;
		}
		$insert = ImageCreateTrueColor($new_w, $new_h);
		imagecopyResampled ($insert, $image, 0, 0, 0, 0, $new_w, $new_h, $w, $h);
		imagecopymerge($background,$insert,$x_offset,$y_offset,0,0,$new_w,$new_h,100);
		imagejpeg($background, $p['savePath'], 80);
		imagedestroy($insert);
		imagedestroy($background);
	}
	
	
	public function open_image ($file, $r='255', $g='255', $b='255') {
    $size=getimagesize($file);

    switch($size["mime"]){
        case "image/jpeg":
			$fh = fopen($file, 'rb');
			$str = '';
			while($fh !== false && !feof($fh)){
    		$str .= fread($fh, 1024);
			}
            //$im = imagecreatefromjpeg($file); //jpeg file
            $im = imagecreatefromstring($str); //jpeg file
        break;
        case "image/gif":
            $im = imagecreatefromgif($file); //gif file
            imageAlphaBlending($im, false);
			imageSaveAlpha($im, true);
			$background = imagecolorallocate($im, 0, 0, 0);
			imagecolortransparent($im, $background);

			$color=imagecolorallocate($im, $r, $g, $b);
			for ($i=0;$i<imagesy($im);$i++){
				for ($j=0; $j<imagesx($im); $j++){
					$rgb=imagecolorat($im, $j, $i);
					if ($rgb==2){
						imagesetpixel($im, $j, $i, $color);
					}
				}
			}

      break;
      case "image/png":
          $im = imagecreatefrompng($file); //png file
          $background = imagecolorallocate($im, 0, 0, 0);
          imageAlphaBlending($im, false);
		  imageSaveAlpha($im, true);
		  imagecolortransparent($im, $background);
		  $color=imagecolorallocate($im, $r, $g, $b);
			for ($i=0;$i<imagesy($im);$i++){
				for ($j=0; $j<imagesx($im); $j++){
					$rgb=imagecolorat($im, $j, $i);
					if ($rgb==2){
						imagesetpixel($im, $j, $i, $color);
					}
				}
			}

      break;
    default:
        $im=false;
    break;
    }
    return $im;
}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return GalleryItem the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=GalleryItem::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		
		
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param GalleryItem $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='gallery-item-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}