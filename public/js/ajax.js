$(document).ready(function() {
    const $btn = $('#request');
    const $bio = $('#bio');

    const image = new Image();
    image.src = 'https://chart.googleapis.com/chart?cht=qr&chl=http://www.google.com&chs=180x180&choe=UTF-8';

    function completeFunction(responseText, textStatus, request) {
        if (textStatus == 'error') {
            $bio.text('An error' + request.status);
        }
    }

    $btn.on('click', function() {
        $("#bio").append(image);
        // $('p').show();
        // $('#request').hide();
    });
});