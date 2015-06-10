<?php
    Yii::app()->clientScript->registerScriptFile('/js/new_task.js',CClientScript::POS_HEAD);
    $this->pageTitle=Yii::app()->name . ' - new_task';
    $this->breadcrumbs=array(
	   'Создать задачу',
    );
    $current_user = User::model()->findByPk(Yii::app()->user->id);
    $user_org = $current_user->organisation_id;    
    $user_list = CHtml::listData(User::model()->findAll('organisation_id=:usr_org', array(':usr_org' => $user_org)), 'id', 'username');
    unset($user_list[Yii::app()->user->id]);
    $current_user_list = array(Yii::app()->user->id => $current_user->username) + $user_list;
    $admin_button = '<button type="button" id="toggle-button" class="btn btn-primary" name="to_user">Выбрать пользователя</button>';
?>
<form class="form-group" action="/site/new_task" method="post">
<!--ошибки валидации !-->
<?=CHtml::errorSummary($form); ?><br>
    <div class="form-group">
        <?=CHtml::activeLabel($form, 'start_date', array('label' => 'Дата начала')); ?>
        <?=CHtml::activeDateTimeLocalField($form, 'start_date', array('class' => 'form-control')) ?>
    </div>
    <div class="form-group">
        <?=CHtml::activeLabel($form, 'finish_date', array('label' => 'Дата окончания')); ?>
        <?=CHtml::activeDateTimeLocalField($form, 'finish_date', array('class' => 'form-control')) ?>
    </div>
    <div class="form-group">
        <?=CHtml::activeLabel($form, 'title', array('label' => 'Заголовок')); ?>
        <?=CHtml::activeTextField($form, 'title', array('class' => 'form-control')) ?>
    </div>
    <div class="form-group">
        <?=CHtml::activeLabel($form, 'content', array('label' => 'Содержание')); ?>
        <?=CHtml::activeTextArea($form, 'content', array('class' => 'form-control')) ?>
    </div>
    <div id="toggle" class="form-group">
        <?=CHtml::activeLabel($form, 'user_id', array('label' => 'Пользователь')); ?>
        <?=CHtml::activeDropDownList($form, 'user_id', $current_user_list, array('class' => 'users form-control')) ?>
    </div>
    <?=CHtml::submitButton('Отправить', array('class' => 'btn btn-default')); ?>
    <?php if($current_user->admin==1){echo $admin_button;} ?>
</form>