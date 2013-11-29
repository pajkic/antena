<?php

class PostController extends Controller
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
		$this->allowUser(EDITOR);
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
		$this->allowUser(EDITOR);
		$model=new Post;
		$languages = Language::model()->findAllByAttributes(array('active'=>1));
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if (isset($_POST['Post'])) {
			$attributes = $_POST['Post'];
			$attributes['created'] = new CDbExpression('NOW()');
			$attributes['updated'] = new CDbExpression('NOW()');
			$attributes['user_id'] = Yii::app()->user->id;
			$attributes['post_type_id'] = 1;
			$attributes['parent_id'] = null;
			
			
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
				
				$this->redirect(array('update','id'=>$model->id));
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
		$this->allowUser(EDITOR);
		$model=$this->loadModel($id);
		

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Post'])) {
			$attributes = $_POST['Post'];
			$attributes['modified'] = new CDbExpression('NOW()');
			$model->attributes=$attributes;
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->id));
			}
		}
		
		
		$_SESSION['KCFINDER'] = array();
		$_SESSION['KCFINDER']['disabled'] = false;
		$_SESSION['KCFINDER']['uploadURL'] = "/uploads/editors/".md5(Yii::app()->user->id); 
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
		$this->allowUser(EDITOR);
		
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
		$this->allowUser(EDITOR);
		/*
		$dataProvider=new CActiveDataProvider('Post');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
		*/
		
		$terms = Term::model()->findAll();
		$array = array();
		foreach($terms as $term) {
			$array[] = array(
				'id'=>$term['id'],
				'text'=>'<b>'.$term['name'].'</b>',
				'parent_id'=>$term['parent_id']);
		}
		$posts = Post::model()->findAllByAttributes(array('post_type_id' => 1));
		foreach($posts as $post){
			$array[]=array(
				'id'=>$post['id'],
				'text'=>$post['name']
				.'<a href='.Yii::app()->baseUrl.'"/backend.php/post/update/'.$post['id'].'"> '.TbHtml::icon(TbHtml::ICON_PENCIL)
				.'</a> <a href='.Yii::app()->baseUrl.'"/backend.php/PostDescription/update/'.$post['id'].'"> '.TbHtml::icon(TbHtml::ICON_EDIT).'</a>',
				'parent_id'=>explode(',', $post['term_id'])
			);
		}
			
		//var_dump($array);die();
		
		$tree = $this->buildTree($array);
		
	
		$this->render('index',array('posts'=>$tree));
		
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$this->allowUser(EDITOR);
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
		
		$model=Post::model()->findByPk($id);
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
	    	if (!$element['parent_id']) {
	    		$element['parent_id'] = array(0);
			} else {
				if (!is_array($element['parent_id'])) {
					$element['parent_id'] = explode(',',$element['parent_id']);
				}
			}
	        if (in_array($parentId, $element['parent_id'])) {
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