$(document).ready(function() {
    $("#search").keyup(function() {
        var input = $(this);

        if( input.val() == "" ) {
            $('.search').html('');
        }
    });
});