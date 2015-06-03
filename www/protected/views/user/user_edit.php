<?=CHtml::form(); ?>
 <!-- То самое место где будут выводиться ошибки
     если они будут при валидации !-->
<?=CHtml::errorSummary($form); ?><br>
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
             <td><?=CHtml::submitButton('Добавить пользователя', array('id' => "new_user")); ?></td>
        </tr>
    </table>
<?=CHtml::endForm(); ?>
<?=CHtml::form(); ?>
Удалить пользователя
    <table id="form3" border="0" width="400" cellpadding="10" cellspacing="10">
        <tr>
            <!-- Выводим поле для выбора логина !-->
            <td width="150"><?=CHtml::activeLabel($form, 'username', array('label' => 'Логин')); ?></td>
            <td><?=CHtml::activeDropDownList($form, 'username', $user_list) ?></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo $user_empty ?></td>
        </tr>
        <tr>
            <td></td>
            <!-- Кнопка "Удалить пользователя" !-->
             <td><?=CHtml::submitButton('Удалить пользователя', array('id' => "del_user")); ?></td>
        </tr>
    </table>
<?=CHtml::endForm(); ?>

<?=CHtml::form(); ?>
<?=CHtml::errorSummary($form); ?><br>
Удалить организацию (введите ваш Логин и Email)
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
             <td><?=CHtml::submitButton('Удалить организацию', array('id' => "del_organisation")); ?></td>
        </tr>
    </table>

<!-- Закрываем форму !-->
<?=CHtml::endForm(); ?>