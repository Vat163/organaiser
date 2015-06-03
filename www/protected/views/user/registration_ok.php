 <h1>Регистрация вашей организации прошла успешно.</h1>
 <h2>Список логинов:</h2>
 <h3>
    <ul>
        <?php     
            echo '<li>Логин:'.$data->username.'</li>';
            echo '<li>Имя:'.$data->first_name.'</li>';
            echo '<li>Фамилия:'.$data->last_name.'</li>';
        ?>
    </ul>
 </h3>