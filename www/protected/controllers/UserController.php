<?php

class UserController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
    
	public function actions()
	{
		// return external action classes, e.g.:
		return array(
            // action captcha для формы регистрации и авторизации
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=> 0x003300,
                'maxLength'=> 6,
                'minLength'=> 3,
                'foreColor'=> 0x66FF66,
            ),
        );
    }
            
	public function actionLogin()
    {
    
        
    
    }    

    public function actionLogout()
    {
        
    }
        
    public function actionRegistration()
    {
        $user = new User();
        
        // Проверяем гость ли пользователь (если нет - формы он увидеть не должен)
        if (!Yii::app()->user->isGuest) {
             throw new CHTTPException('Вы уже зарегистрированны!');
        } else {
            // Если $_POST['User'] не пустой массив - значит была отправлена форма
            if (!empty($_POST['User'])) {
                
                 // Заполняем $user данными которые пришли с формы
                $user->attributes = $_POST['User'];
                
                // Запоминаем данные которые пользователь ввёл в капче
                $user->verifyCode = $_POST['User']['verifyCode'];
                
                    // В validate передаем название сценария
                     if($user->validate('registration')) {
                        // Если валидация прошла успешно, проверяем свободен ли указанный логин
                        $organisation = new Organisation();
                        $organisation->name= $_POST['User']['organisation_name'];
                        // Выводим страницу "ок"        
                        $organisation->save();
                        $user->organisation_id = $organisation->id;
                        $user->save();
                        $this->render('registration_ok');
                                             
                    } else {
                        // Если введенные данные противоречат 
                        // правилам валидации (указаным в rules) тогда
                        // выводим форму и ошибки
                        
                        $this->render('registration', array(
                            'form' => $user,
                            'org_name'=> $_POST['User']['organisation_name'],
                        ));
                    }
             } else {
                // Если $_POST['User'] пустой массив - значит форму некто не отправлял.
                // Значит пользователь просто вошел на страницу регистрации
                // и мы должны показать ему форму.
                 
                $this->render('registration', array('form' => $user));
            }
        }
    }

}