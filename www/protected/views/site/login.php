<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Вход',
);
?>

<div class="container">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'login-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
        'htmlOptions' => array(
            'class' => 'form-signin'
        ),
    )); ?>
    <h2 class="form-signin-heading">Войдите</h2>
    <div class="row">
        <?php echo $form->labelEx($model,'username', array('label' => 'Логин', 'class' => 'sr-only')); ?>
        <?php echo $form->textField($model, 'username', array('class' => 'form-control', 'placeholder' => 'Логин', 'required' => '', 'autofocus' => '')); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'password', array('label' => 'Пароль', 'class' => 'sr-only')); ?>
        <?php echo $form->passwordField($model,'password', array('class' => 'form-control', 'placeholder' => 'Пароль', 'required' => '')); ?>

    </div>
    <div class="row rememberMe">
        <?php echo $form->checkBox($model,'rememberMe'); ?>
        <?php echo $form->label($model,'rememberMe', array('label' => 'Запомнить меня')); ?>
    </div>
    <div class="row enter_errorList bg-danger">
        <?php echo $form->error($model,'username'); ?>
        <?php echo $form->error($model,'password'); ?>
        <?php echo $form->error($model,'rememberMe'); ?>
    </div>
    <div class="row">
       <?php echo CHtml::submitButton('Вход', array('class' => 'btn btn-lg btn-primary btn-block')); ?>
    </div>
        

    <?php $this->endWidget(); ?>
</div>
<!-- form -->