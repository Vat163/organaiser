$(document).ready(function() {
    if(($("select[class=users] option").size())<1){
        $('.user_del').addClass('hidden'); 
    }
});