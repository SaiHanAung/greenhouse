$(document).ready(function() {
    var btt = $('#back-to-top-btn');

    $('body').scroll(function() {
        if ($('body').scrollTop() > 300) {
            btt.addClass('show');
        } else {
            btt.removeClass('show');
        }
    });

    btt.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({ scrollTop: 0 }, '300');
    });
});