<?php

class TermController extends Controller
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
		$model=new Term;
		$languages = Language::model()->findAllByAttributes(array('active'=>1));

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Term'])) {
			$attributes=$_POST['Term'];
			if ($attributes['parent_id']=="") $attributes['parent_id'] = null;
			$model->attributes = $attributes;
			if ($model->save()) {
				foreach($languages as $language) {
            		$description = new TermDescription;
            		$description->attributes =  array(
            		'term_id' => $model->primaryKey,
            		'language_id'=>$language['id'],
            		'title'=>$model->name,
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
		$this->allowUser(SUPERADMINISTRATOR);
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Term'])) {
			$attributes = $_POST['Term'];
			if ($attributes['parent_id'] == '') $attributes['parent_id'] = null;
			
			$model->attributes=$attributes;
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
		/*
		
		$count = Yii::app()->db->createCommand('SELECT parent_id FROM cms_term GROUP BY parent_id')->queryAll();
		$depth = count($count);
		
		$table = 'cms_term';
		
		
		$sql = "SELECT root.name as root_name";
		for ($i=1;$i<=$depth;$i++) {
			$sql .= ', down'.$i.'.name as down'.$i.'_name';
		}
		$sql .= ' from '. $table . ' as root';
		$i = 1;
		$sql .= ' left outer join '.$table.' as down'.$i.' on down'.$i.'.parent_id = root.id';
		for ($i=2;$i<=$depth;$i++) {
			$sql .= ' left outer join '.$table.' as down'.$i.' on down'.$i.'.parent_id = down'.($i-1).'.id';
		}
		$sql .= ' where root.parent_id<=>NULL order by root_name';
		for ($i=1;$i<=$depth;$i++) {
			$sql .= ', down'.$i.'_name';
		}
		
		
		
		$dataProvider=new CSqlDataProvider($sql);
		
		$array = $dataProvider->getData();
		
		$terms = array();
		*/
		
		
		$terms = Term::model()->findAll();
		$array = array();
		foreach($terms as $term) {
			$array[] = array(
			'id'=>$term['id'],
			'text'=>$term['name']
			.'<a href='.Yii::app()->baseUrl.'"/backend.php/term/update/'.$term['id'].'"> '.TbHtml::icon(TbHtml::ICON_PENCIL)
				.'</a> <a href='.Yii::app()->baseUrl.'"/backend.php/TermDescription/update/'.$term['id'].'"> '.TbHtml::icon(TbHtml::ICON_EDIT).'</a>',
			'parent_id'=>$term['parent_id']);

		}

		$tree = $this->buildTree($array);
		
		$this->render('index',array('terms'=>$tree));
		
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$this->allowUser(SUPERADMINISTRATOR);
		$model=new Term('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Term'])) {
			$model->attributes=$_GET['Term'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Term the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Term::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Term $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='term-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	/**
     * Fills the JS tree on an AJAX request.
     * Should receive parent node ID in $_GET['root'],
     *  with 'source' when there is no parent.
     */
    public function actionAjaxFillTree()
    {
    	$this->allowUser(SUPERADMINISTRATOR);
        // accept only AJAX request (comment this when debugging)
        if (!Yii::app()->request->isAjaxRequest) {
            exit();
        }
        // parse the user input
        $parentId = "NULL";
        if (isset($_GET['root']) && $_GET['root'] !== 'source') {
            $parentId = (int) $_GET['root'];
        }
        // read the data (this could be in a model)
        $children = Yii::app()->db->createCommand(
            "SELECT m1.id, m1.name AS text, m2.id IS NOT NULL AS hasChildren "
            . "FROM cms_term AS m1 LEFT JOIN cms_term AS m2 ON m1.id=m2.parent_id "
            . "WHERE m1.parent_id <=> $parentId "
            . "GROUP BY m1.id ORDER BY m1.order ASC"
        )->queryAll();
		
		$cnt = 0;
		foreach ($children as $child){
		//	if ($child['hasChildren']==0) {
		//		$children[$cnt]['text'] = '<a href='.Yii::app()->baseUrl.'"/backend.php/term/update/'.$child['id'].'">'.$child['text'].'</a>';
		//	} else {
			
				$children[$cnt]['text'] = $child['text']
				.'<a href='.Yii::app()->baseUrl.'"/backend.php/term/update/'.$child['id'].'"> '.TbHtml::icon(TbHtml::ICON_PENCIL)
				.'</a> <a href='.Yii::app()->baseUrl.'"/backend.php/TermDescription/update/'.$child['id'].'"> '.TbHtml::icon(TbHtml::ICON_EDIT).'</a>';
			$cnt++;	
		}
		
		
        echo str_replace(
            '"hasChildren":"0"',
            '"hasChildren":false',
            CTreeView::saveDataAsJson($children)
        );
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