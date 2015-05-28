<?=CHtml::form(); ?>
 <!-- То самое место где будут выводиться ошибки
     если они будут при валидации !-->
<?=CHtml::errorSummary($form); ?><br>

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
            <td><?=CHtml::activeTextField($form, 'email') ?></td>
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
            <!-- Выводим поле для organisation_name !-->
            <td width="150"><label for="User_organisation_name">Organisation name</label></td>
            <td><input name="User[organisation_name]" id="User_organisation_name" type="text" /></td>
        </tr>

        <tr>
            <!-- Выводим капчу !-->
            <td><?php $this->widget('CCaptcha', array('buttonLabel' => '<br>[новый код]')); ?></td>
             <td><?=CHtml::activeTextField($form,'verifyCode'); ?></td>
        </tr>
        <tr>
            <td></td>
            <!-- Кнопка "регистрация" !-->
             <td><?=CHtml::submitButton('Регистрация', array('id' => "submit")); ?></td>
        </tr>
    </table>

<!-- Закрываем форму !-->
 <?=CHtml::endForm(); ?>