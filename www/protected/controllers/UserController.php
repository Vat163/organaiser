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
             
    public function actionRegistration()
    {
        $user = new User();
        
        // Проверяем гость ли пользователь (если нет - формы он увидеть не должен)
        if (!Yii::app()->user->isGuest) {
             throw new CHttpException('Вы уже зарегистрированны!');
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
                        $model=new LoginForm;
                        $model->username=$_POST['User']['username'];
                        $model->password=$_POST['User']['password'];
                        $model->rememberMe=true;
                        $model->login();
                        $this->render('registration_ok', array(
                            'data' => $user,
                        ));
                                             
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

    public function actionUser_edit()
    {
        $user_edit = new User();
        
        // Проверяем гость ли пользователь (если да - пересылаем его на страницу входа)
        if (Yii::app()->user->isGuest) {
             $this->redirect('/site/login');
        } else {
            $user_list = CHtml::listData(User::model()->findAll(), 'id', 'username');
            // Если $_POST['User'] не пустой массив - значит была отправлена форма
            if (!empty($_POST['User'])) {
                
                 // Заполняем $user данными которые пришли с формы
                $user_edit->attributes = $_POST['User'];
                
                // В validate передаем название сценария
                if($user_edit->validate('user_edit')) {
                    // Если валидация прошла успешно, ...
                    
                    if ($_POST['new_user']) {
                        $user_edit->save();
                    }
                    
                    if ($_POST['del_user']) {
                        $user_edit=User::model()->find(username);
                        $user_edit->delete();
                    }
                    
                    if ($_POST['del_organisation']) {
                        $user_edit=User::model()->find($this->organisation_id);
                        $organisation = new Organisation();
                        $organisation = $organisation->$user_edit;
                        $organisation->delete();
                    }
                    

                } else {
                    // Если введенные данные противоречат 
                    // правилам валидации (указаным в rules) тогда
                    // выводим форму и ошибки

                    $this->render('user_edit', array(
                        'form' => $user_edit,
                        'user_edit' => $user_list,
                    ));
                }
            } else {
                // Если $_POST['User'] пустой массив - значит форму некто не отправлял.
                // Значит пользователь просто вошел на страницу edit
                // и мы должны показать ему форму.
                $this->render('user_edit', array('form' => $user_edit, 'user_edit' => $user_list,));
            }
        }
    }
    
}