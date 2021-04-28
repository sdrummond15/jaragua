jQuery(document).ready(function ($) {

    $('#phone').mask("(99) 9999-9999");
    $('#cell').mask("(99) 99999-9999");
    $('#cota').mask("999-999999");

    var url = window.location.pathname;
    var pathname = window.location.pathname.indexOf("index.php");
    var path = ''
    if (pathname >= 0) {
        path = url.substr('0', pathname);
    } else {
        path = '';
    }
    $('#cota_form').on('submit', function (event) {
        event.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: path + 'modules/mod_form_cotas/tmpl/sendmail.php',
            data: formData,
            contentType: false,
            cache: false,
            processData:false,
            success: function (data) {
                $('#retornoHTML').append(data);
            },
            beforeSend: function () {
                $('.loading').fadeIn('fast');
            },
            complete: function () {
                $('.loading').fadeOut('fast');
                $('#cota_form').trigger("reset");
            }
        });
    });
});