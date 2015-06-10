<?php
    Yii::app()->clientScript->registerScriptFile('/js/script.js',CClientScript::POS_HEAD);
    $this->pageTitle=Yii::app()->name . ' - Редактировать организацию';
    $this->breadcrumbs=array(
	'Редактировать организацию',
    );
    $current_user = User::model()->findByPk(Yii::app()->user->id);
    $user_org = $current_user->organisation_id;    
    $user_list = CHtml::listData(User::model()->findAll('organisation_id=:usr_org', array(':usr_org' => $user_org)), 'id', 'username');
    unset($user_list[Yii::app()->user->id]);
?>
<div class="row">
    <?=CHtml::form(); ?>
        <div class="panel panel-success">

            <div class="panel-heading text-center profile_title">
                <h3 class="panel-title"><strong>Добавить пользователя</strong></h3>
            </div>

                <div class="errorList bg-danger"><?=CHtml::errorSummary($form); ?></div>
            <div class="form-horizontal">

                <div class="form-group">
                    <?=CHtml::activeLabel($form, 'username', array('label' => 'Логин:', 'class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-9">
                        <?=CHtml::activeTextField($form, 'username', array('class' => 'form-control',)) ?>
                    </div>
                </div>

               <div class="form-group">
                    <?=CHtml::activeLabel($form, 'password', array('label' => 'Пароль:', 'class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-9">
                        <?=CHtml::activePasswordField($form, 'password', array('class' => 'form-control',)) ?>
                    </div>
                </div>
               
                <div class="form-group">
                    <?=CHtml::activeLabel($form, 'email', array('label' => 'Email:', 'class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-9">
                        <?=CHtml::activeEmailField($form, 'email', array('class' => 'form-control')) ?>
                    </div>
                </div>

                <div class="form-group">
                    <?=CHtml::activeLabel($form, 'first_name', array('label' => 'Имя:', 'class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-9">
                        <?=CHtml::activeTextField($form, 'first_name', array('class' => 'form-control',)) ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <?=CHtml::activeLabel($form, 'last_name', array('label' => 'Фамилия:', 'class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-9">
                        <?=CHtml::activeTextField($form, 'last_name', array('class' => 'form-control',)) ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <?=CHtml::activeLabel($form, 'profile', array('label' => 'Должность:', 'class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-9">
                        <?=CHtml::activeTextField($form, 'profile', array('class' => 'form-control',)) ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <?=CHtml::activeLabel($form, 'admin', array('label' => 'Админ', 'class' => 'col-sm-2 control-label')); ?>
                    <div class="col-sm-9">
                        <?=CHtml::activeDropDownList($form, 'admin', array(
                            '1'=>'Да',
                            '0'=>'Нет',
                        ), array('class' => 'form-control',)) ?>
                    </div>
                </div>

                <div class="text-center">
                    <?=CHtml::submitButton('Добавить пользователя', array('class' => "btn btn-success profile_buttons", 'name' => 'new_user')); ?>
                </div>
            </div>
    </div>
    <?=CHtml::endForm(); ?>
    
    <?=CHtml::form(); ?>
    <?php 
        if (empty($user_list)){ 
            $user_empty='У вас пока нету сотрудников';
        } else {
            $user_empty='';
        }
    ?>
    <div class="panel panel-danger">

        <div class="panel-heading text-center profile_title">
            <h3 class="panel-title"><strong>Удалить пользователя</strong></h3>
            <?php if (!empty($user_empty)){ echo '<p class="text-center"><i class="fa fa-info-circle"></i> <strong>'; echo "$user_empty"; echo'</strong></p>';} ?>
        </div>

        <div class="form-horizontal">
            <div class="form-group">
                <?=CHtml::activeLabel($form, 'username', array('label' => 'Логин:', 'class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-9">
                    <?=CHtml::activeDropDownList($form, 'username', $user_list, array('class' => 'form-control', 'id' => 'users')) ?>
                </div>
            </div>
            <div class="text-center">
                <?=CHtml::submitButton('Удалить пользователя', array('class' => "btn btn-danger profile_buttons user_del", 'name' => 'del_user')); ?>
            </div>
        </div>
    </div>
    <?=CHtml::endForm(); ?>

    <?=CHtml::form(); ?>
    <div class="panel panel-danger">

        <div class="panel-heading text-center profile_title">
            <h3 class="panel-title"><strong>Удалить организацию</strong></h3>
            <?php if(isset($error_del)){echo "<div class='bg-danger text-center'><i class='fa fa-exclamation-triangle'></i>$error_del</div>";} ?>
        </div>

        <div class="form-horizontal">
            <div class="form-group">
                <label class="col-sm-2 control-label" for="username">Логин:</label>
                <div class="col-sm-9">
                    <input class="form-control" name="User[username]" id="username" type="text" maxlength="64">
                </div>
            </div>
            <div class="form-group">
                <?=CHtml::activeLabel($form, 'email', array('label' => 'Email:', 'class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-9">
                    <?=CHtml::activeEmailField($form, 'email', array('class' => 'form-control')) ?>
                </div>
            </div>
            <div class="text-center">
                <?=CHtml::submitButton('Удалить организацию', array('class' => "btn btn-danger profile_buttons", 'name' => 'del_organisation')); ?>
            </div>
        </div>
    </div>
    <?=CHtml::endForm(); ?>
</div>