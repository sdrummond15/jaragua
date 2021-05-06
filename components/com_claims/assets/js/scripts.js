jQuery(document).ready(function ($) {

    var SPMaskBehavior = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        spOptions = {
            onKeyPress: function(val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };
    $('#phone').mask(SPMaskBehavior, spOptions);
    $('#cota').mask("999-999999");

    var url = window.location.pathname;
    var pathname = window.location.pathname.indexOf("index.php");
    var path = ''
    if (pathname >= 0) {
        path = url.substr('0', pathname);
    } else {
        path = '';
    }

    $('#claim_form').on('submit', function (event) {

        event.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: path + 'components/com_claims/views/claims/tmpl/sendmail.php',
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
                $('#claim_form').trigger("reset");
            }
        });

    });
});