<?=CHtml::form(); ?>
 <!-- То самое место где будут выводиться ошибки
     если они будут при валидации !-->
<?=CHtml::errorSummary($form); ?><br>
Добавитьпользователя
    <table id="form2" border="0" width="400" cellpadding="10" cellspacing="10">
        <tr>
            <!-- Выводим поле для логина !-->
            <td width="150"><?=CHtml::activeLabel($form, 'username'); ?></td>
            <td><?=CHtml::activeTextField($form, 'username') ?></td>
        </tr>
        <tr>
            <!-- Выводим поле для пароля !-->
            <td><?=CHtml::activeLabel($form, 'password'); ?></td>
            <td><?=CHtml::activePasswordField($form, 'password') ?></td>
        </tr>
        <tr>
            <!-- Выводим поле для email !-->
            <td width="150"><?=CHtml::activeLabel($form, 'email'); ?></td>
            <td><?=CHtml::activeEmailField($form, 'email') ?></td>
        </tr>
        <tr>
            <!-- Выводим поле для first_name !-->
            <td width="150"><?=CHtml::activeLabel($form, 'first_name'); ?></td>
            <td><?=CHtml::activeTextField($form, 'first_name') ?></td>
        </tr>
        <tr>
            <!-- Выводим поле для last_name !-->
            <td width="150"><?=CHtml::activeLabel($form, 'last_name'); ?></td>
            <td><?=CHtml::activeTextField($form, 'last_name') ?></td>
        </tr>
        <tr>
            <!-- Выводим поле для profile !-->
            <td width="150"><?=CHtml::activeLabel($form, 'profile'); ?></td>
            <td><?=CHtml::activeTextField($form, 'profile') ?></td>
        </tr>

        <tr>
            <td></td>
            <!-- Кнопка "Добавить пользователя" !-->
             <td><?=CHtml::submitButton('Добавить пользователя', array('id' => "new_user")); ?></td>
        </tr>
    </table>

Удалить пользователя
<table id="form2" border="0" width="400" cellpadding="10" cellspacing="10">
        <tr>
            <!-- Выводим поле для логина !-->
            <td width="150"><?=CHtml::activeLabel($form, 'username'); ?></td>
            <td><?=CHtml::activeTextField($form, 'username') ?></td>
        </tr>
        <tr>
            <!-- Выводим поле для email !-->
            <td width="150"><?=CHtml::activeLabel($form, 'email'); ?></td>
            <td><?=CHtml::activeEmailField($form, 'email') ?></td>
        </tr>

        <tr>
            <td></td>
            <!-- Кнопка "Удалить пользователя" !-->
             <td><?=CHtml::submitButton('Удалить пользователя', array('id' => "del_user")); ?></td>
        </tr>
    </table>

Удалить организацию
<table id="form2" border="0" width="400" cellpadding="10" cellspacing="10">
        <tr>
            <!-- Выводим поле для логина !-->
            <td width="150"><?=CHtml::activeLabel($form, 'username'); ?></td>
            <td><?=CHtml::activeTextField($form, 'username') ?></td>
        </tr>
        <tr>
            <!-- Выводим поле для email !-->
            <td width="150"><?=CHtml::activeLabel($form, 'email'); ?></td>
            <td><?=CHtml::activeEmailField($form, 'email') ?></td>
        </tr>

        <tr>
            <td></td>
            <!-- Кнопка "Удалить организацию" !-->
             <td><?=CHtml::submitButton('Удалить организацию', array('id' => "del_organisation")); ?></td>
        </tr>
    </table>

<!-- Закрываем форму !-->
 <?=CHtml::endForm(); ?>