<?php
//echo $empty;
$this->pageTitle=Yii::app()->name . ' - Учет времени сотрудников';
$this->breadcrumbs=array(
	'Учет времени сотрудников',
);
foreach($user as $usr) {
    
    echo 'Имя сотрудника: '.$usr->username.''; 
    echo '<br>';
    if(count($all_records[$usr->id])==0){echo 'У данного пользователя пока нет задач';}
    for($i=0; $i < count($all_records[$usr->id]); $i++){
        $data = $all_records[$usr->id][$i];
        echo 'Заголовок: '.$data->title.'';
        echo '<br>';
        echo 'Содержание: '.$data->content.'';
        echo '<br>';
        echo 'Дата начала: '.$data->start_date.'';
        echo '<br>';
        echo 'Дата окончания: '.$data->finish_date.'';
        echo '<br>';
        echo '<br>';
    } 
    
    
}
?>