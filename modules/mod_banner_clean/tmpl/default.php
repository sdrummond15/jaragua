<?php $active = JFactory::getApplication()->getMenu()->getActive(); ?>
    <div id="banner-int">
        <div class="banner-int">
            <div class="overlay"
                 style="background: linear-gradient(rgba(<?= implode(',', hexToRgb($color,0.8)); ?>), rgba(<?= implode(',', hexToRgb($color,0.8)); ?>));"></div>
            <h1><?php echo !empty($active->title) ? $active->title : 'Clube Jaraguá'; ?></h1>
        </div>
    </div>

<?php
function hexToRgb($hex, $alpha = false)
{
    $hex = str_replace('#', '', $hex);
    $length = strlen($hex);
    $rgb['r'] = hexdec($length == 6 ? substr($hex, 0, 2) : ($length == 3 ? str_repeat(substr($hex, 0, 1), 2) : 0));
    $rgb['g'] = hexdec($length == 6 ? substr($hex, 2, 2) : ($length == 3 ? str_repeat(substr($hex, 1, 1), 2) : 0));
    $rgb['b'] = hexdec($length == 6 ? substr($hex, 4, 2) : ($length == 3 ? str_repeat(substr($hex, 2, 1), 2) : 0));
    if ($alpha) {
        $rgb['a'] = $alpha;
    }
    return $rgb;
}
?>