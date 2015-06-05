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
    <div id="reg_content" class="container-fluid">
            <div class="row">
                
                <div class="title">Введите ваши данные для регистрации</div>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-3 form-group">
                            <?=CHtml::activeLabel($org, 'name', array('label' => 'Организация')); ?>
                            <?=CHtml::activeTextField($org, 'name', array('class' => 'form-control')); ?>
                        </div>
                        <div class="col-sm-3 form-group">
                            <?=CHtml::activeLabel($form, 'profile', array('label' => 'Должность')); ?>
                            <?=CHtml::activeTextField($form, 'profile', array('class' => 'form-control')); ?>
                        </div>
                        <div class="col-sm-3 form-group">
                            <?=CHtml::activeLabel($form, 'first_name', array('label' => 'Имя')); ?>
                            <?=CHtml::activeTextField($form, 'first_name', array('class' => 'form-control')); ?>
                        </div>
                        <div class="col-sm-3 form-group">
                            <?=CHtml::activeLabel($form, 'last_name', array('label' => 'Фамилия')); ?>
                            <?=CHtml::activeTextField($form, 'last_name', array('class' => 'form-control')); ?>
                        </div>
                        
                    </div>
                </div>
                
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <?=CHtml::activeLabel($form, 'username', array('label' => 'Логин')); ?>
                                <?=CHtml::activeTextField($form, 'username', array('class' => 'form-control')); ?>
                            </div>
                            <div class="col-sm-4 form-group">
                                <!-- Выводим поле для пароля !-->
                                <?=CHtml::activeLabel($form, 'password', array('label' => 'Пароль')); ?>
                                <?=CHtml::activePasswordField($form, 'password', array('class' => 'form-control')); ?>
                            </div>
                            <div class="col-sm-4 form-group">
                                <!-- Выводим поле для email !-->
                                <?=CHtml::activeLabel($form, 'email'); ?>
                                <?=CHtml::activeEmailField($form, 'email', array('class' => 'form-control')); ?>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="bg-danger">
                    <?=CHtml::errorSummary($form); ?>
                    <?=CHtml::errorSummary($org); ?>
                </div>
                <div class="endline"></div>
                <?=CHtml::submitButton('Регистрация', array('class' => 'btn btn-success', 'id' => 'button')); ?>
                <div class="endline"></div>
                <!-- ошибки при валидации !-->
            </div>
    </div>
<!-- Закрываем форму !-->
 <?=CHtml::endForm(); ?>