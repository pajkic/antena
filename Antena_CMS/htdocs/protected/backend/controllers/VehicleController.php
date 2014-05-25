<?php

class VehicleController extends Controller
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
		$model=new Vehicle;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Vehicle'])) {
			$model->attributes=$_POST['Vehicle'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$_SESSION['KCFINDER'] = array();
		$_SESSION['KCFINDER']['disabled'] = false;
		$_SESSION['KCFINDER']['uploadURL'] = "/uploads/editors/".md5(Yii::app()->user->id); 
		
		
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

		if (isset($_POST['Vehicle'])) {
			$model->attributes=$_POST['Vehicle'];
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
		$this->allowUser(SUPER_EDITOR);
		$dataProvider=new CActiveDataProvider('Vehicle');
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
		$model=new Vehicle('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Vehicle'])) {
			$model->attributes=$_GET['Vehicle'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	

	public function actionSetActive($id)
	{
		$this->allowUser(SUPER_EDITOR);
		$model=$this->loadModel($id);
		$model->attributes = array('active'=>$_POST['active']);
		$model->save();
		echo Yii::t('app','Izmena uspešno izvršena.');
	}
	
	public function actionVehicleFeatures($id)
	{

		$this->allowUser(SUPER_EDITOR);
		if (isset($_POST['Value'])) {
			$vehicle_id = $_POST['vehicle_id'];
			$language_id = $_POST['language_id'];
		}
		if (isset($_POST['Feature'])) {
			VehicleHasFeature::model()->deleteAllByAttributes(array('vehicle_id'=>$vehicle_id,'language_id'=>$language_id));
			$features = $_POST['Feature'];
			$values = $_POST['Value'];
			
			foreach($features as $k => $v) {
				$vehicle_has_feature = new VehicleHasFeature;
				$vehicle_has_feature->attributes = array(
				'vehicle_id'=>$vehicle_id,
				'language_id'=>$language_id,
				'vehicle_feature_id'=>$k,
				'content'=>$values[$k]
				);
				$vehicle_has_feature->save();
				
			}
			
		}
		
		$tabs=array();
		$languages = Language::model()->findAllByAttributes(array('active'=>1));
		foreach($languages as $language) {
			$features_model = VehicleHasFeature::model()->findAllByAttributes(array('vehicle_id'=>$id, 'language_id'=>$language->id));
			$vehicle_features = array();
			foreach($features_model as $fm) {
				$vehicle_features[$fm['vehicle_feature_id']] = $fm['content'];
			}

			$features = VehicleFeatureDescription::model()->findAllByAttributes(array('language_id'=>$language->id));
			$content = $this->renderPartial('_features', array('vehicle_features'=>$vehicle_features,'features' => $features,'vehicle_id'=>$id, 'language_id'=>$language->id), true);
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
		
		
		$this->render('view_features',array(
			'model'=>$this->loadModel($id),
			'tabs'=>$tabs,
		));

	}

	public function actionVehiclePrices($id)
	{

		$this->allowUser(SUPER_EDITOR);
		if (isset($_POST['Prices'])) {
			$vehicle_id = $_POST['vehicle_id'];
			$pricelist_id = $_POST['pricelist_id'];
			VehicleHasPrice::model()->deleteAllByAttributes(array('vehicle_id'=>$vehicle_id,'pricelist_id'=>$pricelist_id));
			$prices = $_POST['Prices'];
			
			
			foreach($prices as $k => $v) {
				$vehicle_has_price = new VehicleHasPrice;
				$vehicle_has_price->attributes = array(
				'vehicle_id'=>$vehicle_id,
				'pricelist_id'=>$pricelist_id,
				'pricedays_id'=>$k,
				'price'=>$v
				);
				$vehicle_has_price->save();
				
			}
			
		}

		$tabs=array();
		$pricelists = Pricelist::model()->findAllByAttributes(array('active'=>1));
		$active = true;
		foreach($pricelists as $pricelist) {
			$prices_model = VehicleHasPrice::model()->findAllByAttributes(array('vehicle_id'=>$id, 'pricelist_id'=>$pricelist->id));
			$vehicle_prices = array();
			foreach($prices_model as $pm) {
				$vehicle_prices[$pm['pricedays_id']] = $pm['price'];
			}

			$pricedays = Pricedays::model()->findAll();
			$content = $this->renderPartial('_prices', array('vehicle_prices'=>$vehicle_prices,'pricedays' => $pricedays,'vehicle_id'=>$id, 'pricelist_id'=>$pricelist->id), true);
				$tabs[] = array(
				'label' => $pricelist['name'],
				'content' => $content,
				'active' => $active
			);
			if ($active) $active=false;
		}
		
		$this->render('view_prices',array(
			'model'=>$this->loadModel($id),
			'tabs'=>$tabs,
		));
		
		
	}
	

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Vehicle the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Vehicle::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Vehicle $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='vehicle-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}