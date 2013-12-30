<?php

class BlockController extends Controller
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
		$this->allowUser(SUPERADMINISTRATOR);
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
		$this->allowUser(SUPERADMINISTRATOR);
		$model=new Block;
		$languages = Language::model()->findAllByAttributes(array('active'=>1));
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Block'])) {
			$attributes = $_POST['Block'];
			$attributes['created'] = new CDbExpression('NOW()');
			$attributes['updated'] = new CDbExpression('NOW()');
			if (!is_array($attributes['terms'])) {
				$attributes['terms']=null;
			} else { 
				$attributes['terms']=implode(',',$attributes['terms']);
			}
			if (!is_array($attributes['pages'])) {
				$attributes['pages']=null;
			} else { 
				$attributes['pages']=implode(',',$attributes['pages']);
			}
			
			$model->attributes=$attributes;
			if ($model->save()) {
			foreach($languages as $language) {
            		$description = new BlockDescription;
            		$description->attributes =  array(
            		'block_id' => $model->primaryKey,
            		'language_id'=>$language['id'],
            		'title'=>$model->name,
            		//'description'=>$model->description
					);
					
					$description->save();
            	}    
				
				$this->redirect(array('view','id'=>$model->id));
			}
		}
		$term_name = array();
		$term_id = array();
		
		$terms = Term::model()->findAll();
		$ids = array();
		$names=array();
		foreach ($terms as $term) {
			$term_name[$term->id] = $term->name;
			$term_id[$term->id] = true;
			$ids[] = $term['id'];
			$names[] = $term['name'];
		}
		$tarray = array_combine($ids, $names);
		$model['terms'] = explode(',',$model['terms']);
		
		$pages = Post::model()->findAllByAttributes(array('post_type_id'=>2));
		
		$pids = array('-1');
		$pnames=array('Index');
		
		foreach ($pages as $page) {
			$pids[] = $page['id'];
			$pnames[] = $page['name'];
		}
		$parray = array_combine($pids, $pnames);
		
		
		$model['pages'] = explode(',',$model['pages']);

		$this->render('create',array(
			'model'=>$model,
			'terms'=>array('id'=>$term_id,'name'=>$term_name),
			'bterms'=>$tarray,
			'bpages'=>$parray
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$this->allowUser(SUPERADMINISTRATOR);
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Block'])) {
			$attributes = $_POST['Block'];
			$attributes['updated'] = new CDbExpression('NOW()');
			if (!is_array($attributes['terms'])) {
				$attributes['terms']=null;
			} else { 
				$attributes['terms']=implode(',',$attributes['terms']);
			}
			if (!is_array($attributes['pages'])) {
				$attributes['pages']=null;
			} else { 
				$attributes['pages']=implode(',',$attributes['pages']);
			}
			
			$model->attributes=$attributes;
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$terms = Term::model()->findAll();
		$ids = array();
		$names=array();
		foreach ($terms as $term) {
			$ids[] = $term['id'];
			$names[] = $term['name'];
		}
		$tarray = array_combine($ids, $names);
		$model['terms'] = explode(',',$model['terms']);
		
		$pages = Post::model()->findAllByAttributes(array('post_type_id'=>2));
		
		$pids = array('-1');
		$pnames=array('Index');
		foreach ($pages as $page) {
			$pids[] = $page['id'];
			$pnames[] = $page['name'];
		}
		$parray = array_combine($pids, $pnames);
		
		
		$model['pages'] = explode(',',$model['pages']);
		
		
		$this->render('update',array(
			'model'=>$model,
			'bterms'=>$tarray,
			'bpages'=>$parray
			
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->allowUser(SUPERADMINISTRATOR);
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
		$this->allowUser(SUPERADMINISTRATOR);
		$dataProvider=new CActiveDataProvider('Block');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$this->allowUser(SUPERADMINISTRATOR);
		$model=new Block('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Block'])) {
			$model->attributes=$_GET['Block'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Block the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Block::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Block $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='block-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionOptions(){
		if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			$type = $_POST['type'];
			
			switch($type) {
				case 1:
					$term_name = array();
					$term_id = array();
					$terms = Term::model()->findAll();
					foreach ($terms as $term) {
						$term_name[$term->id] = $term->name;
						$term_id[$term->id] = true;
					}
					
					$this->renderPartial('forms/_news',array('terms'=>array('id'=>$term_id,'name'=>$term_name)));
					break;
				case 2:
					$gallery_name = array();
					$gallery_id = array();
					$galleries = Gallery::model()->findAll();
					foreach($galleries as $gallery){
						$gallery_name[$gallery->id] = $gallery->name;
						$gallery_id[$gallery->id] = true;
					}
					$this->renderPartial('forms/_gallery',array('galleries'=>array('id'=>$gallery_id,'name'=>$gallery_name)));
					break;
				case 3:
					$this->renderPartial('forms/_menu');					
					break;
				case 4:
					$this->renderPartial('forms/_submenu');
					break;
				case 5:
					$this->renderPartial('forms/_breadcrumbs');
					break;
				case 6:
					$this->renderPartial('forms/_custom');
					break;
				case 7:
					$terms = Term::model()->findAll();
					$posts = Post::model()->findAllByAttributes(array('status_id'=>1));
					$items = array();
					foreach($terms as $term){
						$items['/term/'.$term->id] = 'Kategorija: ' . $term->name;
					}
					foreach($posts as $post){
						$items['/post/'.$post->id] = $post->name;
					}
					$this->renderPartial('forms/_cmenu',array('items'=>$items));
					break;
				case 8:
					$this->renderPartial('forms/_slider');
					break;
				case 9:
					$this->renderPartial('forms/_subcategory');
					break;
				case 10:
					$this->renderPartial('forms/_accordion');
					break;
				case 11:
					$this->renderPartial('forms/_tabs');
					break;

				default:
					break;
			}

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax'])) {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('create'));
			}
		} else {
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}
		
	}
}