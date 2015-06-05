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
<?=CHtml::form(); ?>
    <!-- То самое место где будут выводиться ошибки
     если они будут при валидации !-->

<div class="errorList bg-danger"><?=CHtml::errorSummary($form); ?></div>
<div class="clearfix"></div>
Добавить пользователя
    <table id="form2" border="0" width="400" cellpadding="10" cellspacing="10">
        <tr>
            <!-- Выводим поле для логина !-->
            <td width="150"><?=CHtml::activeLabel($form, 'username', array('label' => 'Логин')); ?></td>
            <td><?=CHtml::activeTextField($form, 'username') ?></td>
        </tr>
        <tr>
            <!-- Выводим поле для пароля !-->
            <td><?=CHtml::activeLabel($form, 'password', array('label' => 'Пароль')); ?></td>
            <td><?=CHtml::activePasswordField($form, 'password') ?></td>
        </tr>
        <tr>
            <!-- Выводим поле для email !-->
            <td width="150"><?=CHtml::activeLabel($form, 'email'); ?></td>
            <td><?=CHtml::activeEmailField($form, 'email') ?></td>
        </tr>
        <tr>
            <!-- Выводим поле для first_name !-->
            <td width="150"><?=CHtml::activeLabel($form, 'first_name', array('label' => 'Имя')); ?></td>
            <td><?=CHtml::activeTextField($form, 'first_name') ?></td>
        </tr>
        <tr>
            <!-- Выводим поле для last_name !-->
            <td width="150"><?=CHtml::activeLabel($form, 'last_name', array('label' => 'Фамилия')); ?></td>
            <td><?=CHtml::activeTextField($form, 'last_name') ?></td>
        </tr>
        <tr>
            <!-- Выводим поле для profile !-->
            <td width="150"><?=CHtml::activeLabel($form, 'profile', array('label' => 'Должность')); ?></td>
            <td><?=CHtml::activeTextField($form, 'profile') ?></td>
        </tr>
        <tr>
            <!-- Выводим поле админ !-->
            <td width="150"><?=CHtml::activeLabel($form, 'admin', array('label' => 'Админ')); ?></td>
            <td><?=CHtml::activeDropDownList($form, 'admin', array(
                '1'=>'Да',
                '0'=>'Нет',
            )) ?></td>
        </tr>

        <tr>
            <td></td>
            <!-- Кнопка "Добавить пользователя" !-->
             <td><?=CHtml::submitButton('Добавить пользователя', array('class' => "btn btn-success", 'name' => 'new_user')); ?></td>
        </tr>
    </table>
<?=CHtml::endForm(); ?>
<?=CHtml::form(); ?>
<?php 
    if (empty($user_list)){ 
        $user_empty='У вас пока нету сотрудников';
    } else {
        $user_empty='';
    }
?>
Удалить пользователя
<p class="bg-info text-center"><i class="fa fa-info-circle"></i> <strong><?= $user_empty; ?></strong></p>
    <table id="form3" border="0" width="400" cellpadding="10" cellspacing="10">
        <tr>
            <!-- Выводим поле для выбора логина !-->
            <td width="150"><?=CHtml::activeLabel($form, 'username', array('label' => 'Логин')); ?></td>
            <td><?=CHtml::activeDropDownList($form, 'username', $user_list, array('class' => 'users')) ?></td>
        </tr>
        <tr>
            <td></td>
            <!-- Кнопка "Удалить пользователя" !-->
             <td><?=CHtml::submitButton('Удалить пользователя', array('class' => 'user_del btn btn-warning', 'name' => 'del_user')); ?></td>
        </tr>
    </table>
<?=CHtml::endForm(); ?>

<?=CHtml::form(); ?>
Удалить организацию (введите ваш Логин и Email)<br>
<?php if(isset($error_del)){echo "<div class='bg-danger text-center'><i class='fa fa-exclamation-triangle'></i>$error_del</div>";} ?>
    <table id="form4" border="0" width="400" cellpadding="10" cellspacing="10">
        <tr>
            <!-- Выводим поле для логина !-->
            <td width="150"><?=CHtml::activeLabel($form, 'username', array('label' => 'Логин')); ?></td>
            <td><?=CHtml::activeTextField($form, 'username') ?></td>
        </tr>
        <tr>
            <!-- Выводим поле для пароля !-->
            <td><?=CHtml::activeLabel($form, 'email'); ?></td>
            <td><?=CHtml::activeEmailField($form, 'email') ?></td>
        </tr>

        <tr>
            <td></td>
            <!-- Кнопка "Удалить организацию" !-->
             <td><?=CHtml::submitButton('Удалить организацию', array('class' => "btn btn-danger", 'name' => 'del_organisation')); ?></td>
        </tr>
    </table>

<!-- Закрываем форму !-->
<?=CHtml::endForm(); ?>