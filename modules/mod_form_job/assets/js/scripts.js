jQuery(document).ready(function ($) {

    $('input[name="type-work"]').on('change', function() {
        if($(this).val() == 0){
            //alternando cores
            $('.btn-type-work').css('background-color', '#676565');
            $(this).siblings('label').css('background-color', '#3B5999');
            $('#tp_oportunidade').show();
            $('#nome').hide();
            $('#nome').val('');
            $('#services').attr('placeholder', 'Descrição da Oportunidade').placeholder();
        }else{
            $('.btn-type-work').css('background-color', '#676565');
            $(this).siblings('label').css('background-color', '#3B5999');
            $('#tp_oportunidade').hide();
            $('#nome').show();
            $('#services').attr('placeholder', 'Descrição da Atividade').placeholder();
        }
    });

    var SPMaskBehavior = function (val) {

            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';

        },

        spOptions = {

            onKeyPress: function(val, e, field, options) {

                field.mask(SPMaskBehavior.apply({}, arguments), options);

            }

        };

    $('#phone').mask(SPMaskBehavior, spOptions);

    $('#phone2').mask(SPMaskBehavior, spOptions);
;

    $('#cota').mask("999-999999");


    var url = window.location.pathname;

    var pathname = window.location.pathname.indexOf("index.php");

    var path = ''

    if (pathname >= 0) {

        path = url.substr('0', pathname);

    } else {

        path = '';

    }

    $('#job-form').on('submit', function (event) {

        event.preventDefault();


        var formData = new FormData(this);


        $.ajax({

            type: "POST",

            url: path + 'modules/mod_form_job/tmpl/sendmail.php',

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

                $('#job-form').trigger("reset");


            }

        });



    });

});

//Função somente numeros

function somenteNumeros(str) {

    var number = str.match(/\d/g);

    return number.join("");

}



