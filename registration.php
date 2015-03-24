<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Organaiser for organisations</title>
        <link rel="stylesheet" href="css/registration.css">
        <!-- Bootstrap -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Courgette' rel='stylesheet' type='text/css'>
        <!-- Js -->
        <script src="js/jquery-2.1.3.min.js" type="text/javascript"></script>
        <script src="js/registration.js" type="text/javascript"></script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <div class="row">
                <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"></div> -->
                <div class="title">Введите ваши данные для регистрации</div>
                <div class="block">
                    
                    <div class="pull-left data">
                        <label for="organization">Название организации<input name="organization" class="data-inputs" id="organization" type="text" maxlength="255"></label>
                    </div>

                    <div class="pull-left data">
                        <label for="post">Должность<input name="post" class="data-inputs" id="post" type="text" maxlength="255"></label>
                    </div>
                
                    <div class="pull-left data">
                        <label for="name">Имя<input name="name" class="data-inputs" id="name" type="text" maxlength="255"></label>
                    </div>

                    <div class="pull-left data">
                        <label for="last_name">Фамилия<input name="post" class="data-inputs" id="last_name" type="text" maxlength="255"></label>
                    </div>
                
                </div>
                
                <div class="clearfix"></div>
                
                <div class="block">
                
                    <div class="pull-left data">
                        <label for="email">Email<input name="email" class="data-inputs" id="email" type="text" maxlength="255"></label>
                    </div>
                   
                    <div class="pull-left data">
                        <label for="login">Логин<input name="name" class="data-inputs" id="login" type="text" maxlength="255"></label>
                    </div>

                    <div class="pull-left data">
                        <label for="password">Пароль<input name="post" class="data-inputs" id="password" type="password" maxlength="12"></label>
                    </div>
                       
                </div>
                
                <div class="block endline">
                    <input name="admin" id="admin" type="checkbox"><label for="admin" title="Админ* - может добавлять/удалять пользователей и выдавать задачи для любого сотрудника">Админ*</label>
                </div>
                
                <div id="padding" class="block endline">
                   
                    <div class="btn-group btns-add_del">
                        <input id="del_worker" class="btn btn-danger btns-add_del_width" name="delete" type="button" value="Удалить работника">
                        <input id="add_worker" class="btn btn-primary btns-add_del_width" name="add" type="button" value="Добавить работника">
                    </div>
                    
                    <input class="btn btn-success" name="done" type="button" value="Готово">
                    
                </div>
                <div id="new_worker"></div>
            </div>
        </div>
        
    </body>
</html>