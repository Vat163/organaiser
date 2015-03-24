<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Organaiser for organisations</title>
    <link rel="stylesheet" href="css/enter.css">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery-2.1.3.min.js"></script>
    
    <div class="container">
      <form class="form-signin">
        <h2 class="form-signin-heading">Войдите</h2>
        <label for="inputEmail" class="sr-only">Email адрес</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email адрес" required="" autofocus="">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Пароль" required="">
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Запомнить меня
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
      </form>
      <a href="registration.php" class="registration">Ещё не зарегистрированы?</a>
    </div>
    
  </body>
</html>