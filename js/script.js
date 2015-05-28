$(document).ready(function() {
    $('#add_worker').on('click', function() {
        $('#new_worker').after('<div id="del_worker_block"><div class="block"><div class="pull-left data"><label for="post">Должность<input name="post" class="data-inputs" id="post" type="text" maxlength="255"></label></div><div class="pull-left data"><label for="name">Имя<input name="name" class="data-inputs" id="name" type="text" maxlength="255"></label></div><div class="pull-left data"><label for="last_name">Фамилия<input name="post" class="data-inputs" id="last_name" type="text" maxlength="255"></label></div></div><div class="clearfix"></div><div class="block"><div class="pull-left data"><label for="email">Email<input name="email" class="data-inputs" id="email" type="text" maxlength="255"></label></div><div class="pull-left data"><label for="login">Логин<input name="name" class="data-inputs" id="login" type="text" maxlength="255"></label></div><div class="pull-left data"><label for="password">Пароль<input name="post" class="data-inputs" id="password" type="password" maxlength="12"></label></div></div><div id="new_worker" class="block endline"><label for="admin" title="Админ - может добавлять/удалять пользователей и выдавать задачи для любого работника">Админ?</label><select name="admin" id="admin"><option value="1">Да</option><option value="0">Нет</option></select></div>')
    });
    
    $('#del_worker').on('click', function() {
        $('#del_worker_block').remove();
    });
    
});

function email_control(email){
    str = email;
    if(str.search(/^[\w\.\d-_]+@[\w\.\d-_]+\.\w{2,4}$/i)){
        alert('gut');
    } else{ alert('bad'); };
    
};

function password_control(password){
    alert(password.search(/^/));
    
};

$(document).ready(function() {
    $('#done').on('click', function() {
        email_control($('.email'));
        password_control($('.password'));
    });
});