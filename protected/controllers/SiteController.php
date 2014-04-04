<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */

	public $layout = '//layouts/inner';

	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->layout = '//layouts/main';
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$dbModel = new Contact;
				$dbModel->name = $model->name;
				$dbModel->email = $model->email;
				$dbModel->phone = $model->phone;
				$dbModel->create_time = time();
				$dbModel->save();

				$files = CUploadedFile::getInstancesByName('files');
				$log = '';

				if (isset($files) && count($files) > 0) {

		                // go through each uploaded image
		                foreach ($files as $index => $file) {

		                	$path = Yii::getPathOfAlias('webroot').'/upload/contacts/'.$dbModel->id;
		                	
		                	if(!is_dir($path)){
		                		mkdir($path, 0755, true);
		                	}

		                    echo $file->name.'<br />';
		                    if ($file->saveAs($path.'/'.$file->name)) {
		                        // add it to the main model now
		                        $file_add = new ContactFile();
		                        $file_add->path = $file->name; //it might be $file_add->name for you, filename is just what I chose to call it in my model
		                        $file_add->contact_id = $dbModel->id; // this links your picture model to the main model (like your user, or profile model)
		                        $file_add->save(); // DONE
		 						$log .= print_r($file_add, true);
		                    }
		                    else {
		                        // handle the errors here, if you want
		                    }
		                }   
		        }

				//Yii::app()->user->setFlash('contact', count($files));
				Yii::app()->user->setFlash('contact','Спасибо! Мы рассмотрим вашу заявку и перезвоним вам в ближайшее время.'.$dbModel->id.$log);
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}