<?php
//echo $empty;

foreach($user as $usr) {
    
    echo 'Имя сотрудника: '.$usr->username.''; 
    echo '<br>';
    
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