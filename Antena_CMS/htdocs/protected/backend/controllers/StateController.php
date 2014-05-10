<?php

class StateController extends Controller
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
		$this->allowUser(ADMINISTRATOR);
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
		$this->allowUser(ADMINISTRATOR);
		$model=new State;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if (isset($_POST['State'])) {
		
			$model->attributes=$_POST['State'];
			$model->flagpath=CUploadedFile::getInstance($model,'flagpath');
			
			if ($model->save()) {
				
				
				if (is_object($model->flagpath)) $model->flagpath->saveAs(Yii::app()->basePath.'/../images/backend/states/'.$model->flagpath);
				$this->redirect(array('index'));
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
		$this->allowUser(ADMINISTRATOR);
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['State'])) {
			$model->attributes=$_POST['State'];
			$flagpath = CUploadedFile::getInstance($model,'flagpath');
			if (is_object($flagpath) && get_class($flagpath)==='CUploadedFile') {
				$model->flagpath = $flagpath;
			}
			
			
			if ($model->save()) {
				if (is_object($model->flagpath)) $model->flagpath->saveAs(Yii::app()->basePath.'/../images/backend/states/'.$model->flagpath);
				$this->redirect(array('index'));
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
		$this->allowUser(ADMINISTRATOR);
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
		$this->allowUser(ADMINISTRATOR);
		$model=State::model()->findAll();
		$dataProvider=new CActiveDataProvider('State');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'model'=>$model
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$this->allowUser(ADMINISTRATOR);
		$model=new State('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['State'])) {
			$model->attributes=$_GET['State'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionSetActive($id)
	{
		$this->allowUser(ADMINISTRATOR);
		$model=$this->loadModel($id);
		$model->attributes = array('active'=>$_POST['active']);
		$model->save();
		echo Yii::t('app','Izmena uspešno izvršena.');
	}

	public function actionSetMain($id)
	{
		$this->allowUser(ADMINISTRATOR);
		State::model()->updateAll(array("main"=>0));
		$model=$this->loadModel($id);
		$model->attributes=array('main'=>1);
		$model->save();
		echo Yii::t('app','Izmena uspešno izvršena.');
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Language the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=State::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Language $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='state-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}