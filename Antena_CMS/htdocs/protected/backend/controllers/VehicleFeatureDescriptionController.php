<?php

class VehicleFeatureDescriptionController extends Controller
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
		//  'accessControl', // perform access control for CRUD operations
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
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$this->allowUser(ADMINISTRATOR);
		if (isset($_POST['VehicleFeatureDescription'])) {
			
			$d_id = $_POST['VehicleFeatureDescription']['id'];
			$model = $this->loadModel($d_id);
			$model->attributes = $_POST['VehicleFeatureDescription'];
			if ($model->save()) {
				//$this->redirect(array('view','id'=>$model->id));
			}
		}

		$descriptions = VehicleFeatureDescription::model()->findAllByAttributes(array('vehicle_feature_id' => $id));
		
		$ld = array();
		foreach($descriptions as $d) {
			$ld[] = $d->attributes['language_id'];
		}
		$languages = Language::model()->findAllByAttributes(array('active' => 1));
		foreach ($languages as $l) {
			if (!in_array($l->attributes['id'],$ld)) {
				$new_model = new VehicleFeatureDescription;
				$new_model->attributes = array('vehicle_feature_id' => $id, 'language_id' => $l->attributes['id']);
				$new_model->save();
				$descriptions = VehicleFeatureDescription::model()->findAllByAttributes(array('vehicle_feature_id' => $id));
			}
		}
		
		
		$parentmodel = array();
		foreach($descriptions as $description) {
			$parentmodel[] = $this->loadModel($description['id']);
			
		}
		$tabs = array();
		foreach ($parentmodel as $lm) {
			$language_id = $lm->attributes['language_id'];
			$language = Language::model()->findByPk($language_id);
			$content = $this->renderPartial('_form', array('model' => $lm), true);
			if ($language['main'] == 1) {
				$active = true;
			} else {
				$active = false; 
			}
			if ($language['active'] == 1) {
				$tabs[] = array(
				'label' => $language['name'],
				'content' => $content,
				'active' => $active
			);
			}
		}
		
		$vehicle_feature = VehicleFeature::model()->findByPk($id);
		$this->render('update',array(
			'model'=>$parentmodel,
			'tabs'=>$tabs,
			'vehicle_feature'=>$vehicle_feature
		));	
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return VehicleFeatureDescription the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=VehicleFeatureDescription::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param VehicleFeatureDescription $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='vehicle-feature-description-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}