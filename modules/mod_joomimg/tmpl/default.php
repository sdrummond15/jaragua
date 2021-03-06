<?php
// $HeadURL: https://joomgallery.org/svn/joomgallery/JG-3/Modules/JoomImages/trunk/tmpl/default.php $
// $Id: default.php 4120 2013-02-28 21:51:03Z erftralle $
defined('_JEXEC') or die('Restricted access');

// Defining sectiontableentry class
$sectiontableentry = "jg_row";
$secnr = 1;
$count_img_per_row = 0;
$csstag = $joomimgObj->getConfig("csstag");
$countobjects = count($imgobjects);

if ($joomimgObj->getConfig('sectiontableentry') == 1) {
    $rowclass = $sectiontableentry . $secnr . " " . $csstag . "row";
} else {
    $rowclass = "joomimg_row";
}
foreach ($imgobjects as $objLink) {
    $posBarra = strrpos($objLink->link, '/');
    $link = substr($objLink->link, 0, $posBarra);
}
$linkall = $link;
// Global module div
?>
<link rel="stylesheet" href="/components/com_joomgallery/css/lightbox.css" type="text/css">
<div class="<?php echo $csstag; ?>main joomimg-module">
    <h1>
        <a href="<?= array_values($imgobjects)[0]->link; ?>"><?= $module->title ?></a>
    </h1>
    <?php
    if ($joomimgObj->getConfig('scrollthis')):
    ?>
    <marquee behavior="scroll" direction="<?php echo $joomimgObj->getConfig('scrolldirection'); ?>" loop="infinite"
             height="<?php echo $joomimgObj->getConfig('scrollheight'); ?>"
             width="<?php echo $joomimgObj->getConfig('scrollwidth'); ?>"
             scrollamount="<?php echo $joomimgObj->getConfig('scrollamount'); ?>"
             scrolldelay="<?php echo $joomimgObj->getConfig('scrolldelay'); ?>"
        <?php echo $joomimgObj->scrollmousecode; ?> class="<?php echo $joomimgObj->getConfig('csstag'); ?>scroll">
        <?php
        endif;

        if ($joomimgObj->getConfig('pagination') && $joomimgObj->getConfig('paginationpos') == 0):

            $paglinks = ceil($countobjects / $joomimgObj->getConfig('paginationct'));
            ?>
            <div class="<?php echo $csstag . "pagnavi"; ?>">
                <span id="<?php echo $csstag . "paglink_1" ?>" class="<?php echo $csstag . "paglinkactive"; ?>">1</span>
                <?php
                for ($linkct = 2; $linkct <= $paglinks; $linkct++):
                    ?>
                    <span id="<?php echo $csstag . "paglink_" . $linkct ?>"
                          class="<?php echo $csstag . "paglink"; ?>"><?php echo $linkct; ?></span>
                    <?php
                endfor;
                ?>
            </div>
            <?php
        endif;

        // First row
        ?>
        <div class="<?php echo $rowclass; ?>">

            <?php
            $imgct = 0;
            if ($countobjects > 0):
            foreach ($imgobjects as $obj):
            $imgct++;
            if ($joomimgObj->getConfig('pagination')
                && $imgct > $joomimgObj->getConfig('paginationct')
            ):
                break;
            endif;
            // Checks if a new row should be started
            if ($count_img_per_row >= $joomimgObj->getConfig('img_per_row')):
            ?>
        </div>
        <div class="joomimg_clr"></div>
    <?php
    $count_img_per_row = 0;

    if ($joomimgObj->getConfig('sectiontableentry') == 1):
        $secnr = ($secnr == 1) ? 2 : 1;
        $rowclass = $sectiontableentry . $secnr . " joomimg_row";
    else:
        $rowclass = "joomimg_row";
    endif;
    ?>
    <div class="<?php echo $rowclass; ?>">
    <?php
    endif;
    ?>
    <div class="<?php echo $csstag; ?>imgct box-img">
        <?php
        $count_img_per_row++;
        ?>

        <?php $pos = strrpos($obj->link, 'rel="');
        if ($pos) {
            $link = trim(substr($obj->link, 0, $pos - 2)) . '" data-lightbox="example-set" title="' . $obj->imgtitle;
        } else {
            $link = $obj->link;
        }
        ?>
        <a class="image-gallery"
           href="<?= $link ?>"
           style="background-image: url(<?= $obj->imagesource; ?>);"
        ></a>
    </div>
    <?php
    endforeach;
    // close last row
    ?>
    <div class="<?php echo $csstag; ?>imgct box-img">
        <a href="<?php echo $linkall; ?>">
                <span>
                    <small>
                        Todas as galerias <i class="fas fa-angle-double-right"></i>
                    </small>
                </span>
        </a>
    </div>
    </div>
        <div class="joomimg_clr"></div>
    <?php
    else:
        if ($joomimgObj->getConfig('show_empty_message')):
            echo JText::_('JINO_PICTURES_AVAILABLE');
        endif;
    endif;
    if ($joomimgObj->getConfig('scrollthis') == 1):
    ?>
    </marquee>
<?php
endif;
// Pagination if active
// Output all image elements in hidden container
// and the links for pagination
if ($joomimgObj->getConfig('pagination')):
    if ($joomimgObj->getConfig('paginationpos') == 1):
        $paglinks = ceil($countobjects / $joomimgObj->getConfig('paginationct'));
        ?>
        <div class="<?php echo $csstag . "pagnavi"; ?>">
            <span id="<?php echo $csstag . "paglink_1" ?>" class="<?php echo $csstag . "paglinkactive"; ?>">1</span>
            <?php
            for ($linkct = 2; $linkct <= $paglinks; $linkct++):
                ?>
                <span id="<?php echo $csstag . "paglink_" . $linkct ?>"
                      class="<?php echo $csstag . "paglink"; ?>"><?php echo $linkct; ?></span>
                <?php
            endfor;
            ?>
        </div>
        <?php
    endif;
    ?>
    <div id="<?php echo $csstag . "pagelems"; ?>" style="display:none">
        <?php
        // Output the html code of all image elements
        $imgct = 0;
        foreach ($imgobjects as $obj):
            $imgct++;
            ?>
            <div id="<?php echo $csstag . "pagelem_" . $imgct; ?>" class="<?php echo $csstag . "pagelem"; ?>">
                <?php
                echo $obj->pagelem;
                ?>
            </div>
            <?php
        endforeach;
        ?>
    </div>
    <?php
endif;
?>
</div>
<script type="text/javascript" src="/components/com_joomgallery/js/lightbox-plus-jquery.js"></script>
<script>
    jQuery(document).ready(function ($) {
        $(window).on('resize', function () {
            $('.box-img > a').height(parseInt($('.box-img > a').width() * 0.9));
        }).trigger('resize');
    });
</script>