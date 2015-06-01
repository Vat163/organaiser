<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
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
        if(Yii::app()->user->isGuest) 
        {
            $this->render('GuestIndex');
        } else if(Yii::app()->user->id)
		{
            $this->render('index');
        }
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
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Спасибо что связались с нами. Мы ответим вам так скоро, насколько это возможно.');
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
            {
				$this->redirect(Yii::app()->user->returnUrl);
            }
        }
		// display the login form
		$this->render('login',array('model'=>$model));
	}

    public function actionNew_task(){
    
        $records = new Records();
        
        // Проверяем гость ли пользователь (если да - перенаправляем на страницу входа)
        if (Yii::app()->user->isGuest) {
             $this->redirect('/site/login');
        } else {
            // Если $_POST['Records'] не пустой массив - значит была отправлена форма
            if (!empty($_POST['Records'])) {
                
                // Заполняем $records данными которые пришли с формы
                $records->attributes = $_POST['Records'];
                
                     // В validate передаем название сценария
                     if($records->validate()) {
                        // Если валидация прошла успешно, записываем все в бд
                        $records->user_id=Yii::app()->user->id;
                        $records->save();
                        $this->redirect('view');
                        
                     } else {
                        // Если введенные данные противоречат 
                        // правилам валидации (указаным в rules) тогда
                        // выводим форму и ошибки
                        
                        $this->render('new_task', array(
                            'form' => $records,
                        ));
                    }
             } else {
                // Если $_POST['Records'] пустой массив - значит форму некто не отправлял.
                // Значит пользователь просто вошел на страницу регистрации
                // и мы должны показать ему форму.
                 
                $this->render('new_task', array('form' => $records));
            }
        }
    
    }
    
    public function actionView(){
    
        $records = new Records();
        
        // Проверяем гость ли пользователь (если да - перенаправляем на страницу входа)
        
        if (Yii::app()->user->isGuest) {
             $this->redirect('/site/login');
        } else {
            $records=Records::model()->findAll('user_id=:usr_id', array(':usr_id' => Yii::app()->user->id));
            if (Records::model()->count(new CDbCriteria (array(
                    'condition' => 'user_id = :usr_id',
                    'params' => array(':usr_id' => Yii::app()->user->id),
                    )))
               <1
               )
            {
                echo ('У вас пока нет задач');
            };
            $this->render('view', array(
                            'form' => $records,
                        ));
        }
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