<?php
    if (!empty($_POST['submited'])) {
        $date = $_POST['datetime'];
        echo('date');
    }
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Organaiser for organisations</title>
        <link rel="stylesheet" href="css/style.css">
        <!-- Bootstrap -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="css/bootstrap-theme.css">
        <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Courgette' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/font-awesome.css">
        <!-- Js -->
        <script src="js/jquery-2.1.3.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="js/script.js" type="text/javascript"></script>
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="header">
            <div class="container">
            <div class="header-content pull-left">Logo</div>
            <div class="header-content pull-left">Links on pages</div>
            <div class="header-content pull-right">
                <div class="hide">
                    <div class="pull-right dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="fa fa-cog" title="Настройки"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Настройки</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Выход</a></li>
                        </ul>
                    </div>

                    <div class="pull-right" id="username">
                        <i class="fa fa-user"></i>
                        <a href="#">Username</a>
                    </div>
                </div>
                
                <div class="pull-right">
                    <a href="registration.php" class="decor_none btn-sm btn-primary">Регистрация</a>
                    <a href="#loginModal" data-toggle="modal" class="decor_none btn-sm btn-success">Вход</a>
                    <div class="modal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                        <form action="footer.php" metod="POST" id="enter" class="form-signin">
                            <h2 class="form-signin-heading">Войдите</h2>
                            <label for="inputEmail" class="sr-only">Email адрес</label>
                            <input type="email" id="inputEmail" class="form-control" placeholder="Email адрес" required="" autofocus="">
                            <label for="inputPassword" class="sr-only">Password</label>
                            <input type="password" id="inputPassword" class="form-control" placeholder="Пароль" required="">
                            <div class="checkbox">
                                <label><input type="checkbox" value="remember-me"> Запомнить меня</label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
                        </form>
                        <div class="registration"><a href="registration.php">Ещё не зарегистрированы?</a></div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            </div>
        </div>
        <div class="container">

        <form action="footer.php" metod="POST">
            <input type="date" id="inputEmail" class="form-control">
            <input type="time" id="inputEmail" class="form-control">
            <input type="datetime-local" id="inputEmail" class="form-control" name="datetime">
            <input type="submit" class="btn" name="submited">
        </form>
        
        </div>
        <div class="footer">
            <div class="footer-text">
                <ul class="footer-links">
                    <li><a href="#">О проекте</a></li>
                    <li>·</li>
                    <li><a href="#">Контакты</a></li>
                </ul>
            </div>
        </div>
    </body>
</html>