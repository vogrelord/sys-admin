<?php

class DocumentController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/inner';
	public $title;


	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
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
		$model=new Document;
		$this->layout = '//layouts/admin';


		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Document']))
		{
			$model->attributes=$_POST['Document'];
			
			$model->pdf_file = CUploadedFile::getInstance($model,'pdf_file');
			$model->doc_file = CUploadedFile::getInstance($model,'doc_file');
			$model->category_id = $_POST['Document']['category_id'];

			if($model->save()){
				$path = YiiBase::getPathOfAlias('webroot') .'/upload/documents/'.$model->id;
				if(!is_dir($path)){
					mkdir($path, 755, true);
				}
				$model->pdf_file->saveAs($path.'/'.$model->pdf_file->name);
				$model->doc_file->saveAs($path.'/'.$model->doc_file->name);
				
				$this->redirect(array('view','id'=>$model->id));
			}else{
				Yii::app()->user->setFlash('document','Ошибка сохранения.'.print_r($model,true));
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
		$this->layout = '//layouts/admin';

		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Document']))
		{
			$model->attributes=$_POST['Document'];
			
			$pdf_file = CUploadedFile::getInstance($model,'pdf_file');
			
			if($pdf_file){
				$model->pdf_file = $pdf_file;
			}

			$doc_file =  CUploadedFile::getInstance($model,'doc_file');
			
			if($doc_file){
				$model->doc_file = $doc_file;
			}

    		$model->category = Document::model()->findByPK($_POST['Document']['category_id']);


			if($model->save()){
				$path = YiiBase::getPathOfAlias('webroot').'/upload/documents/'.$model->id;
				if(!is_dir($path)){
					mkdir($path, 755, true);
				}
				if($pdf_file)
					$model->pdf_file->saveAs($path.'/'.$model->pdf_file->name);
				
				if($doc_file)
				    $model->doc_file->saveAs($path.'/'.$model->doc_file->name);
				
				$this->redirect(array('view','id'=>$model->id));
			}else{
				Yii::app()->user->setFlash('document','Ошибка сохранения.'.print_r($model,true));
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
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		//$dataProvider=new CActiveDataProvider('Document');
		//$categories = new CActiveDataProvider('DocumentCategory');
		$freeDocuments = Document::model()->findAllByAttributes(array('category_id' => null));
		$this->render('index',array(
			'freeDocuments'=>$freeDocuments,
			'categories'=>DocumentCategory::model()->findAll(),
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$this->layout = '//layouts/admin';

		$model=new Document('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Document']))
			$model->attributes=$_GET['Document'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Document the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Document::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Document $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='document-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
