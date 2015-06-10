$(document).ready(function() {
    if(($("select[id=users] option").size())<1){
        $('.user_del').addClass('hidden'); 
    }
});