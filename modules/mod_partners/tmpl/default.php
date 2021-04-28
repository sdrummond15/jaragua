<!--Slide-->

<div id="modpartners">

    <div class="partners">

        <div class="slider-wrap">

            <div class="slider">

                <ul>

                    <?php

                    foreach ($partners as $partner) {
                        $paramLogo = json_decode($partner->params);
                        $image = $partner->image;

                        $link = $paramLogo->link_url;
                    ?>
                        <li>
                            <div>
                                <div class="partner">
                                    <?php if ($link): ?>
                                    <a href="<?= $paramLogo->link_url; ?>" class="partner-logo" target="_blank">
                                        <span style="background-image: url('<?= $image ?>'); "></span>
                                    </a>
                                    <?php else: ?>
                                    <div class="partner-logo" >
                                        <span style="background-image: url('<?= $image ?>'); "></span>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </li>

                    <?php

                    }

                    ?>

                </ul>

            </div>

            <a href="#" class="slider-arrow sa-left"><i class="fa fa-chevron-left fa-1x" aria-hidden="true"></i></a>

            <a href="#" class="slider-arrow sa-right"><i class="fa fa-chevron-right fa-1x"
                                                         aria-hidden="true"></i></a>

        </div>

    </div>

</div>


<script src="./modules/mod_partners/assets/js/jquery.lbslider.js"></script>

<script>

    jQuery('.slider').lbSlider({

        leftBtn: '.sa-left',

        rightBtn: '.sa-right',

        visible: 5,

        autoPlay: true,

        autoPlayDelay: 5


    });


    jQuery(function () {
        jQuery(window).on('resize', function () {

            var largura = jQuery(window).width();

            if (largura > 1000){
                jQuery('.slider').mouseover(function () {

                    jQuery('.slider-arrow').css('opacity', '1');

                });

                jQuery('.slider').mouseout(function () {

                    jQuery('.slider-arrow').css('opacity', '0');

                });

                jQuery('.slider-arrow').mouseover(function () {

                    jQuery('.slider-arrow').css('opacity', '1');

                });

                jQuery('.slider-arrow').mouseout(function () {

                    jQuery('.slider-arrow').css('opacity', '0');

                });
            }
        }).trigger('resize');
    });

    jQuery(function () {
        jQuery(window).on('resize', function () {

            var largura = jQuery(window).width();

            if (largura > 1200) {
                jQuery('#modpartners .slider').css('width', 1170);
            }

            if (largura <= 1200 && largura > 936) {
                jQuery('#modpartners .slider').css('width', 936);
            }
            if (largura <= 936 && largura > 702) {
                jQuery('#modpartners .slider').css('width', 702);
            }
            if (largura <= 702 && largura > 468) {
                jQuery('#modpartners .slider').css('width', 468);
            }
            if (largura <= 468) {
                jQuery('#modpartners .slider').css('width', 234);
            }

            var tamFoto = jQuery('#modpartners .slider .partner').width();
            jQuery('#modpartners .slider .partner').css('height', tamFoto);


        }).trigger('resize');
    });



</script>