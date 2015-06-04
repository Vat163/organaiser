<?php
    Yii::app()->clientScript->registerCssFile('/css/registration.css'); 
?>
<?=CHtml::form(); ?>
<?php 
    $this->pageTitle=Yii::app()->name . ' - registration';
    $this->breadcrumbs=array(
        'Регистрация',
    );
?> 
    <div class="container">
            <div class="row">
                
                <div class="title">Введите ваши данные для регистрации</div>
                <div class="block">
                    <div class="pull-left data">
                        <?=CHtml::activeLabel($org, 'name', array('label' => 'Организация')); ?>
                        <?=CHtml::activeTextField($org, 'name', array('class' => 'data-inputs')); ?>
                    </div>
                    <div class="pull-left data">
                        <?=CHtml::activeLabel($form, 'profile', array('label' => 'Должность')); ?>
                        <?=CHtml::activeTextField($form, 'profile', array('class' => 'data-inputs')); ?>
                    </div>
                    <div class="pull-left data">
                        <?=CHtml::activeLabel($form, 'first_name', array('label' => 'Имя')); ?>
                        <?=CHtml::activeTextField($form, 'first_name', array('class' => 'data-inputs')); ?>
                    </div>
                    <div class="pull-left data">
                        <?=CHtml::activeLabel($form, 'last_name', array('label' => 'Фамилия')); ?>
                        <?=CHtml::activeTextField($form, 'last_name', array('class' => 'data-inputs')); ?>
                    </div>
                </div>
                
                <div class="clearfix"></div>
                
                <div class="block">
                    <div class="pull-left data">
                        <?=CHtml::activeLabel($form, 'username', array('label' => 'Логин')); ?>
                        <?=CHtml::activeTextField($form, 'username', array('class' => 'data-inputs')); ?>
                    </div>
                    <div class="pull-left data">
                        <!-- Выводим поле для пароля !-->
                        <?=CHtml::activeLabel($form, 'password', array('label' => 'Пароль')); ?>
                        <?=CHtml::activePasswordField($form, 'password', array('class' => 'data-inputs')); ?>
                    </div>
                    <div class="pull-left data">
                        <!-- Выводим поле для email !-->
                        <?=CHtml::activeLabel($form, 'email'); ?>
                        <?=CHtml::activeEmailField($form, 'email', array('class' => 'data-inputs')); ?>
                    </div>
                </div>
                    
                <div class="block endline"></div>
                    <?=CHtml::submitButton('Регистрация', array('class' => "btn btn-success")); ?>
                <div id="padding" class="block endline"></div>
                <!-- ошибки при валидации !-->
                <div class="bg-danger">
                <?=CHtml::errorSummary($form); ?>
                <?=CHtml::errorSummary($org); ?>
                </div>
            </div>
    </div>
<!-- Закрываем форму !-->
 <?=CHtml::endForm(); ?>