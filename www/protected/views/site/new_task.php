<?=CHtml::form(); ?>
 <!-- То самое место где будут выводиться ошибки
     если они будут при валидации !-->
<?=CHtml::errorSummary($form); ?><br>

    <table id="form2" border="0" width="400" cellpadding="10" cellspacing="10">
        <tr>
            <!-- Выводим поле для логина !-->
            <td width="150"><?=CHtml::activeLabel($form, 'title', array('label' => 'Заголовок')); ?></td>
            <td><?=CHtml::activeTextField($form, 'title') ?></td>
        </tr>
        <tr>
            <!-- Выводим поле для пароля !-->
            <td><?=CHtml::activeLabel($form, 'content', array('label' => 'Содержание')); ?></td>
            <td><?=CHtml::activeTextArea($form, 'content') ?></td>
        </tr>
        <tr>
            <!-- Выводим поле для email !-->
            <td width="150"><?=CHtml::activeLabel($form, 'start_date', array('label' => 'Дата начала')); ?></td>
            <td><?=CHtml::activeDateTimeLocalField($form, 'start_date') ?></td>
        </tr>
        <tr>
            <!-- Выводим поле для email !-->
            <td width="150"><?=CHtml::activeLabel($form, 'finish_date', array('label' => 'Дата окончания')); ?></td>
            <td><?=CHtml::activeDateTimeLocalField($form, 'finish_date') ?></td>
        </tr>
        <tr>
            <td></td>
            <!-- Кнопка "регистрация" !-->
             <td><?=CHtml::submitButton('Отправить'); ?></td>
        </tr>
    </table>

<!-- Закрываем форму !-->
 <?=CHtml::endForm(); ?>