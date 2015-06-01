<?=CHtml::form(); ?>
 <!-- То самое место где будут выводиться ошибки
     если они будут при валидации !-->
<?=CHtml::errorSummary($form); ?><br>
<?php
foreach ($form as $data) {
        echo "<table id='form2' border='0' width='400' cellpadding='10' cellspacing='10'>
            <tr>
                <!-- Выводим поле для логина !-->
                
                <td>$data->title</td>
            </tr>
            <tr>
                <!-- Выводим поле для пароля !-->
                
                <td>$data->content</td>
            </tr>
            <tr>
                <!-- Выводим поле для даты начала !-->
                
                <td>$data->start_date</td>
            </tr>
            <tr>
                <!-- Выводим поле для даты конца !-->
                
                <td>$data->finish_date</td>
            </tr>
            <tr>
                <td></td>
                <!-- Кнопки !-->
                 <td><?=CHtml::submitButton('Задача Выполнена'); ?></td>
                 <td><?=CHtml::submitButton('Редактировать'); ?></td>
                 <td><?=CHtml::submitButton('Удалить'); ?></td>             
            </tr>
        </table>
    ";};
?>

<!-- Закрываем форму !-->
<?=CHtml::endForm(); ?>