jQuery(document).ready(function ($) {



    $(window).on('resize', function () {



        $('.doing-img').each(function () {

            $(this).height($(this).width());

        });



    }).trigger('resize');



});