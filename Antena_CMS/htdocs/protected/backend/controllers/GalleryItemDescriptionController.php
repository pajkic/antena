<?php

class GalleryItemDescriptionController extends Controller
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
		$model=new GalleryItemDescription;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['GalleryItemDescription'])) {
			$model->attributes=$_POST['GalleryItemDescription']['id'];
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
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if (isset($_POST['GalleryItemDescription'])) {
			
			$d_id = $_POST['GalleryItemDescription']['id'];
			$model = $this->loadModel($d_id);
			$model->attributes = $_POST['GalleryItemDescription'];
			if ($model->save()) {
				//$this->redirect(array('view','id'=>$model->id));
			}
		}
		
		$descriptions = GalleryItemDescription::model()->findAllByAttributes(array('gallery_item_id' => $id));
		$parentmodel = array();
		foreach($descriptions as $description) {
			$parentmodel[] = $this->loadModel($description['id']);
			
		}
		
		$item = GalleryItem::model()->findByPk($id);
		$image = '/uploads/gallery/'.$item->gallery_id.'/thumbs/'.$item->name;
		
		$tabs = array();
		foreach ($parentmodel as $lm) {
			$language_id = $lm->attributes['language_id'];
			$language = Language::model()->findByPk($language_id);
			$content = $this->renderPartial('_form', array('model' => $lm), true);
			if ($language['main'] == 1) {
				$active = true;
			} else $active = false;
			$tabs[] = array(
				'label' => $language['name'],
				'content' => $content,
				'active' => $active
			);
		}

		$gallery = Gallery::model()->findByPk($item->gallery_id);
		
		
		
		$this->render('update',array(
			'model'=>$parentmodel,
			'image'=>$image,
			'tabs'=>$tabs,
			'item' => $item,
			'gallery' => $gallery
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
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

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
		$dataProvider=new CActiveDataProvider('GalleryItemDescription');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new GalleryItemDescription('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['GalleryItemDescription'])) {
			$model->attributes=$_GET['GalleryItemDescription'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return GalleryItemDescription the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=GalleryItemDescription::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param GalleryItemDescription $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='gallery-item-description-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}