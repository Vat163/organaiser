<?php

class UserController extends Controller
{
             
    public function actionRegistration()
    {
        $user = new User();
        $organisation = new Organisation();
        // Проверяем гость ли пользователь (если нет - формы он увидеть не должен)
        if (!Yii::app()->user->isGuest) {
             throw new CHttpException('Вы уже зарегистрированны!');
        } else {
            // Если $_POST['User'] не пустой массив - значит была отправлена форма
            if (!empty($_POST['User'])) {
                
                // Заполняем $user данными которые пришли с формы
                $user->attributes = $_POST['User'];
                $organisation->attributes = $_POST['Organisation'];
                // В validate проверяем данные пришедшие с формы
                $user_validate = $user->validate();
                $organisation_validate = $organisation->validate();
                if($user_validate && $organisation_validate) {
                // Если валидация прошла успешно, заносим организацию в бд и связываем её id с пользвателем
                    $organisation->save();
                    $org_id = $organisation->id;
                    $user->organisation_id = $org_id;
                    $user->admin = 1;
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
                        'org' => $organisation,
                    ));
                }
             } else {
                // Если $_POST['User'] пустой массив - значит форму некто не отправлял.
                // Значит пользователь просто вошел на страницу регистрации
                // и мы должны показать ему форму.
                 
                $this->render('registration', array(
                    'form' => $user,
                    'org' => $organisation,
                ));
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
            } elseif (isset($_POST['del_user'])) {
                $user_edit=User::model()->findByPk($_POST['User']['username']);
                $user_edit->delete();
                $this->render('user_edit', array(
                        'form' => new User(),
                    ));
            } elseif (isset($_POST['del_organisation'])) {
                $login = $_POST['User']['username'];
                $email = $_POST['User']['email'];
                $user = User::model()->findByPk(Yii::app()->user->id);
                if($user->admin==1 && $user->username==$login && $user->email==$email)
                {
                    $organisation = Organisation::model()->findByPk($user->organisation_id);
                    $organisation->delete();
                    Yii::app()->user->logout();
                    $this->redirect(Yii::app()->homeUrl);
                } else {
                    $error_del = 'Некорректные данные';
                    $this->render('user_edit', array(
                        'form' => new User(),
                        'error_del' => $error_del
                    ));
                }
            } else {
                $this->render('user_edit', array(
                    'form' => $user_edit,
                ));    
            }
        }
    }
    
    public function actionProfile()
    {
        if (Yii::app()->user->isGuest) {
             $this->redirect('/site/login');
        } else {
            $user = User::model()->findByPk(Yii::app()->user->id);
            // Проверка кнопок
            if(isset($_POST['update_login'])){
                $user->username = $_POST['User']['username'];
                if($user->validate()){
                    $user->save();
                    $this->render('profile');
                } else {
                    $this->render('profile', array(
                        'form_login' => $user,
                    ));
                }
            }elseif (isset($_POST['update_password'])){
        
                if (CPasswordHelper::verifyPassword($_POST['old_password'],$user->password)){
                    $user->password = CPasswordHelper::hashPassword($_POST['User']['password']);
                    if($user->validate()){
                        $user->save();
                        $this->render('profile');
                    }
                } else {
                    $this->render('profile');
                }
            }elseif (isset($_POST['update_email'])){
                $user->email = $_POST['User']['email'];
                if($user->validate()){
                    $user->save();
                    $this->render('profile');
                } else {
                    $this->render('profile', array(
                            'form_email' => $user,
                    ));
                }
            }elseif(isset($_POST['update_profile'])){
                $user->profile = $_POST['User']['profile'];
                if($user->validate()){
                    $user->save();
                    $this->render('profile');
                } else {
                    $this->render('profile', array(
                        'form_profile' => $user,
                    ));
                }
            } else {
                $this->render('profile');
            }
        }
    }
}