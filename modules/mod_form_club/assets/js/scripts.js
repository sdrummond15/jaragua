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

    $('#whatsapp').mask("(99) 99999-9999");

    $('#cnpj').mask("99.999.999/9999-99");



    $('#logo-club').change(function () {

        var fileUpload = $(this)[0];



        if (this.value) {

            if (typeof (fileUpload.files) != "undefined") {

                var reader = new FileReader();

                reader.readAsDataURL(fileUpload.files[0]);

                reader.onload = function (e) {

                    var image = new Image();

                    image.src = e.target.result;

                    image.onload = function () {

                        return true;

                    };

                    image.onerror = function () {

                        alert('Selecione uma imagem!');

                        $(".desc-photo").focus();

                        $("#logo-club").val('');

                        $("#capa").text('');

                        return false;

                    }

                }

            }

        }

    });



    $('.logo-club').change(function () {

        var nameImage = '';

        if ($(this)[0].files.length > 1) {

            nameImage = $(this)[0].files.length + ' Fotos Selecionadas';

        } else {

            nameImage = $(this).val().split('\\').pop();

        }

        $(this).siblings('.desc-photo').text(nameImage);

    });





    $('.btn-add').on('click', function () {

        $(this).siblings('.logo-club').click();

    });



    $('#cnpj').focusout(function () {

        if ($("#cnpj").val().length > 0) {

            if ($("#cnpj").val().length < 18) {

                alert('CNPJ Inválido!');

                $("#cnpj").focus();

                $("#cnpj").val('');

                return false;

            }



            var validarCnpj = VerificaCNPJ(somenteNumeros($("#cnpj").val()));



            if (validarCnpj === false) {

                alert('CNPJ Inválido!');

                $("#cnpj").focus();

                $("#cnpj").val('');

                return false;

            }

        }

    });





    var url = window.location.pathname;

    var pathname = window.location.pathname.indexOf("index.php");

    var path = ''

    if (pathname >= 0) {

        path = url.substr('0', pathname);

    } else {

        path = '';

    }

    $('#club-form').on('submit', function (event) {

        event.preventDefault();



        var formData = new FormData(this);



        $.ajax({

            type: "POST",

            url: path + 'modules/mod_form_club/tmpl/sendmail.php',

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

                $('#club-form').trigger("reset");

                $('.desc-photo').text("");

            }

        });



    });

});





//Função Valida CNPJ



function VerificaCNPJ(cnpj) {



    cnpj = cnpj.replace(/[^\d]+/g, '');



    if (cnpj == '') return false;



    if (cnpj.length != 14)

        return false;



    // Elimina CNPJs invalidos conhecidos



    if (cnpj == "00000000000000" ||

        cnpj == "11111111111111" ||

        cnpj == "22222222222222" ||

        cnpj == "33333333333333" ||

        cnpj == "44444444444444" ||

        cnpj == "55555555555555" ||

        cnpj == "66666666666666" ||

        cnpj == "77777777777777" ||

        cnpj == "88888888888888" ||

        cnpj == "99999999999999")

        return false;



    // Valida DVs

    tamanho = cnpj.length - 2;

    numeros = cnpj.substring(0, tamanho);

    digitos = cnpj.substring(tamanho);

    soma = 0;

    pos = tamanho - 7;

    for (i = tamanho; i >= 1; i--) {

        soma += numeros.charAt(tamanho - i) * pos--;

        if (pos < 2)

            pos = 9;

    }



    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;

    if (resultado != digitos.charAt(0))

        return false;



    tamanho = tamanho + 1;

    numeros = cnpj.substring(0, tamanho);

    soma = 0;

    pos = tamanho - 7;

    for (i = tamanho; i >= 1; i--) {

        soma += numeros.charAt(tamanho - i) * pos--;

        if (pos < 2)

            pos = 9;

    }



    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;

    if (resultado != digitos.charAt(1))

        return false;



    return true;



}



//Função somente numeros



function somenteNumeros(str) {

    var number = str.match(/\d/g);

    return number.join("");

}



