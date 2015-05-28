 <h1>Регистрация вашей организации прошла успешно.</h1>
 <h2>Список юзеров:</h2>
 <h3>
    <ul>
        <?php 
        foreach ($registered_users as $user) {
            echo ‘<li>Логин:'.$user->username.' Пароль:'.$user->password.'</li>’;
        }
        ?>
    </ul>
 </h3>