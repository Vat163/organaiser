<?php
//echo $empty;
$this->pageTitle=Yii::app()->name . ' - Чат';
$this->breadcrumbs=array(
	'Чат',
);
echo 'Организация: '.$org_name; 
foreach($chat_record as $records) {
    
    echo '<br>';
        echo 'Заголовок: '.$records->message;
        echo '<br>';
        echo 'Содержание: '.$records->date;
        echo '<br>';
        echo 'Имя юзера: '.$records->user->username;
}
?>
<br>
<form method="POST" action="/site/chat">
    <input type="text" name="text">
    <button type="submit">Отправить</button>
</form>