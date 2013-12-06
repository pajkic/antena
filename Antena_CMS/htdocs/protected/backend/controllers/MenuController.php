<?php

class MenuController extends Controller
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
		$model=new Menu;
		$languages = Language::model()->findAllByAttributes(array('active'=>1));

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Menu'])) {
			$attributes=$_POST['Menu'];
			if ($attributes['parent_id']=="") {
				$attributes['parent_id'] = null;
				$attributes['level'] = 0;
			} else {
				$parent = Menu::model()->findByPk($attributes['parent_id']);
				$attributes['level'] = $parent->level+1;
				}
			switch ($attributes['type']) {
				case 'page':
					$attributes['content'] = '/post/'.$attributes['content'];
					break;
				case 'post':
					$attributes['content'] = '/post/'.$attributes['content'];
					break;
				case 'term':
					$attributes['content'] = '/term/'.$attributes['content'];
					break;
				case 'link':
					$attributes['content'] = 'http://'.$attributes['content'];
				default:
					break;
			}
			
		
			
			
			$model->attributes = $attributes;
			if ($model->save()) {
				foreach($languages as $language) {
            		$description = new MenuDescription;
            		$description->attributes =  array(
            		'menu_id' => $model->primaryKey,
            		'language_id'=>$language['id'],
            		'title'=>$model->name,
					);
					
					$description->save();
            	}  
				$this->redirect(array('/MenuDescription/update','id'=>$model->id));
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

		if (isset($_POST['Menu'])) {
			$attributes=$_POST['Menu'];
			if ($attributes['parent_id']=="") {
				$attributes['parent_id'] = null;
				$attributes['level'] = 0;
			} else {
				$parent = Menu::model()->findByPk($attributes['parent_id']);
				$attributes['level'] = $parent->level+1;
				}
			switch ($attributes['type']) {
				case 'page':
					$attributes['content'] = '/post/'.$attributes['content'];
					break;
				case 'post':
					$attributes['content'] = '/post/'.$attributes['content'];
					break;
				case 'term':
					$attributes['content'] = '/term/'.$attributes['content'];
					break;
				case 'link':
					$attributes['content'] = 'http://'.$attributes['content'];
				default:
					break;
			}
		
			
			
			$model->attributes = $attributes;

			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->id));
			}
		}
		
		switch ($model['type']) {
			case ('page'):
				$model['content'] = substr($model['content'], strrpos($model['content'],'/')+1);
			break;
			case ('post'):
				$model['content'] = substr($model['content'], strrpos($model['content'],'/')+1);
			break;
			case ('term'):
				$model['content'] = substr($model['content'], strrpos($model['content'],'/')+1);
			break;
			default:
				break;
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
			Menu::model()->updateAll(array('parent_id'=>null),'parent_id="'.$id.'"');

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
		$menus = Menu::model()->findAll(array('order'=>'sort'));
		$array = array();
		
		foreach($menus as $menu) {
			$array[] = array(
			'id'=>$menu['id'],
			'text'=>$menu['name']
			.'<a href='.Yii::app()->baseUrl.'"/backend.php/menu/update/'.$menu['id'].'"> '.TbHtml::icon(TbHtml::ICON_PENCIL)
				.'</a> <a href='.Yii::app()->baseUrl.'"/backend.php/MenuDescription/update/'.$menu['id'].'"> '.TbHtml::icon(TbHtml::ICON_EDIT).'</a>',
			'parent_id'=>$menu['parent_id']);

		}
		 
		$tree = $this->buildTree($array);
		$this->render('index',array('menus'=>$tree));	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$this->allowUser(SUPER_EDITOR);
		$model=new Menu('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Menu'])) {
			$model->attributes=$_GET['Menu'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Menu the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Menu::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Menu $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='menu-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	private function buildTree(array $elements, $parentId = 0) {
	    $branch = array();
	
	    foreach ($elements as $element) {

	        if ($element['parent_id'] == $parentId) {
	            $children = $this->buildTree($elements, $element['id']);
	            if ($children) {
	                $element['children'] = $children;
	            }
	            $branch[] = $element;
	        }
	    }
	    return $branch;
	}


}