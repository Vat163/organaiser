<?=CHtml::form(); ?>
 <!-- То самое место где будут выводиться ошибки
     если они будут при валидации !-->
<?=CHtml::errorSummary($form); ?><br>
<?php
echo $empty;
foreach ($form as $data) {
        echo "<table id='form2' border='0' width='400' cellpadding='10' cellspacing='10'>
            
            <tr>
                <!-- Заполняем поле заголовок !-->
                <td>Заголовок</td>
                <td>$data->title</td>
            </tr>
            <tr>
                <!-- Заполняем поле контент !-->
                <td>Контент</td>
                <td>$data->content</td>
            </tr>
            <tr>
                <!-- Заполняем поле дата начала !-->
                <td>Дата начала</td>
                <td>$data->start_date</td>
            </tr>
            <tr>
                <!-- Заполняем поле дат конца !-->
                <td>Дата окончания</td>
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