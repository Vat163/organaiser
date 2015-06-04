<?=CHtml::form(); ?>
 <!-- То самое место где будут выводиться ошибки
     если они будут при валидации !-->
<?=CHtml::errorSummary($form); ?><br>
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>#</th>
                    <th>Заголовок</th>
                    <th>Контент</th>
                    <th>Дата и время начала</th>
                    <th>Дата и время окончания</th>
                </tr>
                
                    
<?php
$i=1;
echo $empty;
foreach ($form as $data) {
    echo "<tr><td>";
    echo $i++;
    echo "          </td>
                    <td>$data->title</td>
                    <td>$data->content</td>
                    <td>$data->start_date</td>
                    <td>$data->finish_date</td>
                </tr>
    ";
};
?>
            </table>
        </div>

<!-- Закрываем форму !-->
<?=CHtml::endForm(); ?>