<?php

class PageController extends Controller
{
		
	/*
	public function __construct() {
		$_SESSION['KCFINDER'] = array();
		$_SESSION['KCFINDER']['disabled'] = false;
	}
	 * */
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
		$model=new Post;
		$languages = Language::model()->findAllByAttributes(array('active'=>1));
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if (isset($_POST['Post'])) {
			$attributes = $_POST['Post'];
			$attributes['created'] = new CDbExpression('NOW()');
			$attributes['modified'] = new CDbExpression('NOW()');
			$attributes['user_id'] = Yii::app()->user->id;
			$attributes['post_type_id'] = 2;
			$attributes['term_id'] = 0;
			if ($attributes['parent_id']=="") $attributes['parent_id'] = null;
			
			$model->attributes=$attributes;
			
			if ($model->save()) {
			foreach($languages as $language) {
            		$description = new PostDescription;
            		$description->attributes =  array(
            		'post_id' => $model->primaryKey,
            		'language_id'=>$language['id'],
            		'title'=>$model->name,
					);
					
					$description->save();
            	}    
				
				$this->redirect(array('/PageDescription/update','id'=>$model->id));
			}
		}
		$_SESSION['KCFINDER'] = array();
		$_SESSION['KCFINDER']['disabled'] = false;
		$_SESSION['KCFINDER']['uploadURL'] = "/uploads/pages"; 
		
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

		if (isset($_POST['Post'])) {
			$attributes = $_POST['Post'];
			if ($attributes['parent_id']=="") $attributes['parent_id'] = null;
			$attributes['modified'] = new CDbExpression('NOW()');
			$model->attributes=$attributes;
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->id));
			}
		}
		
		
		$_SESSION['KCFINDER'] = array();
		$_SESSION['KCFINDER']['disabled'] = false;
		$_SESSION['KCFINDER']['uploadURL'] = "/uploads/pages"; 
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
			Page::model()->updateAll(array('parent_id'=>null),'parent_id="'.$id.'"');
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
		/*
		$this->allowUser(SUPER_EDITOR);
		$dataProvider=new CActiveDataProvider('Post', array(
    	'criteria'=>array(
	        'condition'=>'post_type_id=2',
	        'order'=>'created DESC',
    	),
    	'pagination'=>array(
        	'pageSize'=>20,
    	),
		));
		
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
		*/
		
		$pages = Post::model()->findAllbyAttributes(array('post_type_id'=>2));
		$array = array();
		foreach($pages as $page) {
			$array[] = array(
			'id'=>$page['id'],
			'text'=>$page['name']
			.'<a href='.Yii::app()->baseUrl.'"/backend.php/page/update/'.$page['id'].'"> '.TbHtml::icon(TbHtml::ICON_PENCIL)
				.'</a> <a href='.Yii::app()->baseUrl.'"/backend.php/PageDescription/update/'.$page['id'].'"> '.TbHtml::icon(TbHtml::ICON_EDIT).'</a>',
			'parent_id'=>$page['parent_id']);

		}
		$tree = $this->buildTree($array);
		
		$this->render('index',array('pages'=>$tree));
		
		
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$this->allowUser(SUPER_EDITOR);
		$model=new Post('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Post'])) {
			$model->attributes=$_GET['Post'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Post the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Post::model()->findByAttributes(array('id'=>$id,'post_type_id'=>2));
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Post $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='post-form') {
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