<?php
//echo $empty;
$this->pageTitle=Yii::app()->name . ' - Чат';
$this->breadcrumbs=array(
	'Чат',
);
?>
<div class="panel panel-default">
    <div class="panel-heading static-top">
        <h3 class="panel-title">Оргагнизация: <?=$org_name?></h3>
    </div>
</div>
<div class="panel panel-default">
    <div id="chat">
    <div class="panel-body">
    <?php
    foreach($chat_record as $records) {
    echo '<div id="messages">';
            echo '<div class="pull-left">'; echo '<strong>'.$records->user->username.':</strong></div>'; 
            echo "<div class='pull-left'>$records->message</div>";
            echo "<div class='pull-right'>$records->date</div><br>";

    echo '</div>';

    }
    ?>
    </div>
    </div>
</div>
<br>
<form method="POST" action="/site/chat" class="form-inline">
    <div class="form-group">
        <input type="text" name="text" class="form-control">
        <button type="submit" class="btn btn-primary">Отправить</button>
    </div>
</form>