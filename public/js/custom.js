$(document).ready(function () {
    $('.confirm').click(function () {
        if (!confirm(" are you sure ?")) {
            return false;
        }
    });
    
});