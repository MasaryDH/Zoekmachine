// cleanen van het de opgezochte bij een leeg inputfield
$(document).ready(function() {
    $("#search").keyup(function() {
        var input = $(this);

        if( input.val() == "" ) {
            $('.search').html('');
        }
    });
});