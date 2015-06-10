<?php
//echo $empty;
$this->pageTitle=Yii::app()->name . ' - Учет времени сотрудников';
$this->breadcrumbs=array(
	'Учет времени сотрудников',
);
?>
<?php
foreach ($user as $usr) {
echo'
<div class="panel panel-default">
    <div class="table-responsive">
        <div class="panel-heading bg-info text-center">
            <i class="fa fa-info-circle"></i> 
            <strong>
';
                    echo 'Имя сотрудника: '.$usr->username; echo '<br>';
                    if(count($all_records[$usr->id])==0) {
                        echo 'У данного пользователя пока нет задач';
                    }
echo '
            </strong>
        </div>
        <table class="table table-striped">
            <tr>
                <th>#</th>
                <th>Заголовок</th>
                <th>Контент</th>
                <th>Дата и время начала</th>
                <th>Дата и время окончания</th>
            </tr>
';
    
    for($i=0; $i < count($all_records[$usr->id]); $i++){
        $data = $all_records[$usr->id][$i];
        echo "<tr><td>";
        echo $i+1;
        echo "          </td>
                        <td>$data->title</td>
                        <td>$data->content</td>
                        <td>$data->start_date</td>
                        <td>$data->finish_date</td>
                    </tr>
        ";
    };
echo '
        </table>
    </div>
</div>
';
}
?>