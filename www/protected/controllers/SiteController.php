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
            $records = new Records();
        
            // Проверяем гость ли пользователь (если да - перенаправляем на страницу входа)
        
            if (Yii::app()->user->isGuest) {
                 $this->redirect('/site/login');
            } else {
                $records=Records::model()->findAll('user_id=:usr_id', array(':usr_id' => Yii::app()->user->id));
                if (
                       count($records)==0
                   )
                    {$empty = 'У вас пока нет задач';} else {$empty='';};
                $this->render('view', array(
                                'form' => $records,
                                'empty' => $empty,
                ));
            }
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
            if (count($records)==0
               ){$empty = 'У вас пока нет задач';} else {$empty='';};
            $this->render('view', array(
                            'form' => $records,
                            'empty' => $empty,
                        ));
        }
    }

    public function actionOrganisation_info(){
        
        if (Yii::app()->user->isGuest) {
             $this->redirect('/site/login');
        } else {
            $user = User::model()->findByPk(Yii::app()->user->id);
            if($user->admin == 1){
                // находим всех юзеров с орг_id как у админа
                $user = User::model()->findAll('organisation_id=:org_id', array(':org_id' => $user->organisation_id));
                
                foreach($user as $usr)
                {
                    $user_id = $usr->id;
                    // теперь в some_records лежит строка из бд для каждого пользвателя
                    $some_records = Records::model()->findAll('user_id=:usr_id', array(':usr_id' => $user_id));
                    $all_records[$user_id] = $some_records;
                }

                $this->render('organisation_info', array(
                        'user' => $user,
                        'all_records' => $all_records,
                    )
                );
            }
        }
    }
    public function actionProfile(){
        
        $user_edit = new User();
        
        // Проверяем гость ли пользователь (если да - пересылаем его на страницу входа)
        if (Yii::app()->user->isGuest) {
             $this->redirect('/site/login');
        } else {
            // Проверка кнопок
            if(isset($_POST['new_user'])){
                // Заполняем $user данными которые пришли с формы
                $user = new User;
                $user->attributes = $_POST['User'];
                if($user->validate()) {
                    $user_row = User::model()->findByPk(Yii::app()->user->id);
                    $org = $user_row->organisation_id;
                    $user->organisation_id = $org;
                    $user->save();
                    $this->render('user_edit', array(
                        'form' => $user_edit,
                    ));
                } else {
                    $this->render('user_edit', array(
                        'form' => $user,
                    ));
                }
        
        
    }
    public function actionChat(){
        $chat = new Chat;
        
        $user = User::model()->findByPk(Yii::app()->user->id);
        $org_id = $user->organisation_id;
        if (isset($_POST['text'])){
            $chat->message = $_POST['text'];
            $chat->user_id = Yii::app()->user->id;
            $chat->org_id = $org_id;
            $chat->save();
        }
        $org_name = Organisation::model()->findByPk($org_id);
        $org_name = $org_name->name;
        $chat_record = Chat::model()->findAll(array(
            'order' => 'date',
            'limit' => 100,
            'condition' => 'org_id = '.$org_id,
        ));
        $this->render('chat', array(
                        'chat_record' => $chat_record,
                        'org_name' => $org_name,
            )
        );
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