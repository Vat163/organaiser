<?php
    $this->pageTitle=Yii::app()->name . ' - Редактировать профиль';
    $this->breadcrumbs=array(
	   'Редактировать профиль',
    );
    $current_user = User::model()->findByPk(Yii::app()->user->id);
?>


<?=CHtml::form(); ?>
<div class="errorList bg-danger"><?=CHtml::errorSummary($form); ?></div>
    <div class="clearfix"></div>
    <div>Изменить логин</div>
    <!-- ошибки при валидации !-->
    
    <div>Текущий логин: <?=$current_user->username;?></div>
    <div>
        <?=CHtml::activeLabel($form, 'username', array('label' => 'Новый логин:')); ?>
        <?=CHtml::activeTextField($form, 'username') ?>
    </div>
    <?=CHtml::submitButton('Изменить Логин', array('class' => "btn btn-success", 'name' => 'update_login')); ?>
<?=CHtml::endForm(); ?>


<?=CHtml::form(); ?>
    <div>Изменить пароль</div>
    <div class="errorList bg-danger"><?php if (isset($wrong_pass)){echo $wrong_pass;} ?></div><br>
    <div>
        <label for="old_password">Старый пароль:</label>
        <input name="old_password" id="old_password" type="password" maxlength="64">
    </div>
    <div>
        <?=CHtml::activeLabel($form, 'password', array('label' => 'Новый пароль:')); ?>
        <?=CHtml::activePasswordField($form, 'password') ?>
    </div>
    <?=CHtml::submitButton('Изменить пароль', array('class' => "btn btn-success", 'name' => 'update_password')); ?>
<?=CHtml::endForm(); ?>
    
    
<?=CHtml::form(); ?>
    <div>Адрес вашей электронной почты</div>
    <div>Текущий адрес: <?="$current_user->email";?></div>
    <div>
        <?=CHtml::activeLabel($form, 'email', array('label' => 'Новый адрес:')); ?>
        <?=CHtml::activeEmailField($form, 'email') ?>
    </div>
    <?=CHtml::submitButton('Сохранить адрес', array('class' => "btn btn-success", 'name' => 'update_email')); ?>
<?=CHtml::endForm(); ?>
    
    
<?=CHtml::form(); ?>
    <div>Изменить должность</div>
    <div>Текущая должность: <?="$current_user->profile";?></div>
    <div>
        <?=CHtml::activeLabel($form, 'profile', array('label' => 'Новая должность:')); ?>
        <?=CHtml::activeTextField($form, 'profile') ?>
    </div>
    <?=CHtml::submitButton('Изменить должность', array('class' => "btn btn-success", 'name' => 'update_profile')); ?>     
<?=CHtml::endForm(); ?>