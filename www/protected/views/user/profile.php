<?php
    $this->pageTitle=Yii::app()->name . ' - Редактировать профиль';
    $this->breadcrumbs=array(
	   'Редактировать профиль',
    );
    $current_user = User::model()->findByPk(Yii::app()->user->id);
?>

<div class="container">
    <div class="row">
        <?=CHtml::form(); ?>
            <!-- ошибки при валидации !-->
            <div class="errorList bg-danger"><?=CHtml::errorSummary($form); ?></div>
            <div class="clearfix"></div>
            
            <div class="panel panel-primary">
                
                <div class="panel-heading text-center profile_title">
                    <h3 class="panel-title">Изменить логин</h3>
                </div>
                
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Текущий логин:</label> 
                        <div class="col-sm-8">
                            <p class="form-control-static"><?=$current_user->username;?></p>    
                        </div>
                    </div>

                    <div class="form-group">
                            <?=CHtml::activeLabel($form, 'username', array('label' => 'Новый логин:', 'class' => 'col-sm-3 control-label')); ?>
                            <div class="col-sm-8">
                                <?=CHtml::activeTextField($form, 'username', array('class' => 'form-control')) ?>
                            </div>
                    </div>
                    <div class="text-center">
                        <?=CHtml::submitButton('Изменить Логин', array('class' => "btn btn-primary profile_buttons", 'name' => 'update_login')); ?>
                    </div>
                </div>
            </div>
        <?=CHtml::endForm(); ?>


        <?=CHtml::form(); ?>
            <div class="panel panel-primary">
                
                <div class="panel-heading text-center profile_title">
                    <h3 class="panel-title">Изменить пароль</h3>
                </div>
                   
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="old_password">Старый пароль:</label>
                            <div class="col-sm-8">
                                <input class="form-control" name="old_password" id="old_password" type="password" maxlength="64">
                            </div>
                        </div>
                        <div class="form-group">
                            <?=CHtml::activeLabel($form, 'password', array('label' => 'Новый пароль:', 'class' => 'col-sm-3 control-label')); ?>
                            <div class="col-sm-8">
                                <?=CHtml::activePasswordField($form, 'password', array('class' => 'form-control')) ?>
                            </div>
                        </div>
                        <div class="text-center">
                            <?=CHtml::submitButton('Изменить пароль', array('class' => "btn btn-primary profile_buttons", 'name' => 'update_password')); ?>
                        </div>
                    </div>
            </div>
        <?=CHtml::endForm(); ?>


        <?=CHtml::form(); ?>
            <div class="panel panel-primary">
            
                <div class="panel-heading text-center profile_title">
                        <h3 class="panel-title">Адрес вашей электронной почты</h3>
                </div>

                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Текущий адрес:</label>
                        <div class="col-sm-8">
                            <p class="form-control-static"><?="$current_user->email";?></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <?=CHtml::activeLabel($form, 'email', array('label' => 'Новый адрес:', 'class' => 'col-sm-3 control-label')); ?>
                        <div class="col-sm-8">
                            <?=CHtml::activeEmailField($form, 'email', array('class' => 'form-control')) ?>
                        </div>
                    </div>
                    <div class="text-center">
                        <?=CHtml::submitButton('Сохранить адрес', array('class' => "btn btn-primary profile_buttons", 'name' => 'update_email')); ?>
                    </div>
                </div>
            </div>
        <?=CHtml::endForm(); ?>


        <?=CHtml::form(); ?>
            <div class="panel panel-primary">

                <div class="panel-heading text-center profile_title">
                    <h3 class="panel-title">Изменить должность</h3>
                </div>
                
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Текущая должность:</label>
                        <div class="col-sm-8">
                            <p class="form-control-static"><?="$current_user->profile";?></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <?=CHtml::activeLabel($form, 'profile', array('label' => 'Новая должность:', 'class' => 'col-sm-3 control-label')); ?>
                        <div class="col-sm-8">
                            <?=CHtml::activeTextField($form, 'profile', array('class' => 'form-control')) ?>
                        </div>
                    </div>
                    <div class="text-center">
                        <?=CHtml::submitButton('Изменить должность', array('class' => "btn btn-primary profile_buttons", 'name' => 'update_profile')); ?>
                    </div>
                </div>
            </div>
        <?=CHtml::endForm(); ?>
    </div>
</div>