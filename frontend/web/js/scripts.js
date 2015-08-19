$(document).ready(function () {
    $(window).load(function(){
        $('#book-detail').modal('show');
    });
});

$(document).on('ready pjax:success', function(){
    $('#book-detail').modal('show');
});