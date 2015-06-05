$(document).ready(function() {
    if(($("select[class=users] option").size())<1){
        $('.users').addClass('hidden');
        $('.user_del').addClass('hidden'); 
    }
});