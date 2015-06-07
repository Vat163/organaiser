 <div class="alert alert-success text-center" role="alert"><i class="fa fa-check-square"></i></div>
 <h1>Регистрация вашей организации прошла успешно.</h1>
 <h2>Ваши данные:</h2>
 <h3>
    <ul>
        <?php     
            echo '<li>Логин:'.$data->username.'</li>';
            echo '<li>Имя:'.$data->first_name.'</li>';
            echo '<li>Фамилия:'.$data->last_name.'</li>';
            echo '<li>Должность:'.$data->profile.'</li>';
            echo '<li>Email:'.$data->email.'</li>';
        ?>
    </ul>
    <div class="alert alert-info text-center" role="alert"><i class="fa fa-info-circle"></i></div>
    <div class="text-center"><strong>Для аутентификации вам понадобятся логин и пароль</strong></div><br>
    <div class="text-center"><a href="/" ><strong>Перейти на домашнюю страницу</strong></a></div>
 </h3>