<?php
    $this->pageTitle=Yii::app()->name . ' - new_task';
    $this->breadcrumbs=array(
	   'Создать задачу',
    );
    $current_user = User::model()->findByPk(Yii::app()->user->id);
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
    <?=CHtml::submitButton('Отправить', array('class' => 'btn btn-default')); ?>
</form>