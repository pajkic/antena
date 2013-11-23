<?php

class GalleryController extends Controller
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
		$this->allowUser(SUPER_EDITOR);
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$this->allowUser(SUPER_EDITOR);
		$model=new Gallery;
		$languages = Language::model()->findAllByAttributes(array('active'=>1));
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Gallery'])) {
			$model->attributes=$_POST['Gallery'];
			if ($model->save()) {
			foreach($languages as $language) {
            		$description = new GalleryDescription;
            		$description->attributes =  array(
            		'gallery_id' => $model->primaryKey,
            		'language_id'=>$language['id'],
            		'title'=>$model->name,
            		'description'=>$model->description
					);
					
					$description->save();
            	}    
				
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
		$this->allowUser(SUPER_EDITOR);
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Gallery'])) {
			$model->attributes=$_POST['Gallery'];
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
		$this->allowUser(SUPER_EDITOR);
		if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			if ($this->loadModel($id)->delete()){
				$galleryPath = Yii::app()->basePath.'/../uploads/gallery/'.$id;
				$this->deleteGallery($galleryPath);
			}

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax'])) {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
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
		$this->allowUser(SUPER_EDITOR);
		$dataProvider=new CActiveDataProvider('Gallery');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$this->allowUser(SUPER_EDITOR);
		$model=new Gallery('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Gallery'])) {
			$model->attributes=$_GET['Gallery'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Gallery the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Gallery::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Gallery $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='gallery-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	protected function deleteGallery($directory,$empty=false) 
	{
		$this->allowUser(SUPER_EDITOR);
		if(substr($directory,-1) == '/'){
			$directory = substr($directory,0,-1);
		}
		if(!file_exists($directory) || !is_dir($directory))	{
			return FALSE;
	    }
		elseif(!is_readable($directory)) {
			return FALSE;
		}
		else {
			$handle = opendir($directory);
			while (FALSE !== ($item = readdir($handle))) {
				if($item != '.' && $item != '..') {
					$path = $directory.'/'.$item;
					if(is_dir($path)) {
						$this->deleteGallery($path);
	                } else {
	                	unlink($path);
					}
				}
			}
			closedir($handle);
			if($empty == FALSE)	{
				if(!rmdir($directory)) {
						return FALSE;
					}
				}
			return TRUE;
			}
}
}