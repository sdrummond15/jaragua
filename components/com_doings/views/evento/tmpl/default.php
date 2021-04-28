<?php
require_once(JPATH_SITE . '/components/com_doings/models/doings.php');
$document = JFactory::getDocument();

foreach ($this->evento as $evento): ?>
    <div class="evento">
        <?php
        $image = 'images/amda.jpg';
        if (!empty($evento->image)) {
            $image = $evento->image;
        }
        ?>
        <div class="evento-img">
            <figure>
                <span style="background-image: url(<?php echo $image; ?>)"></span>
            </figure>
        </div>


        <h1><?php echo $evento->name; ?></h1>

        <?php if ($evento->date_start != '0000-00-00' || $evento->date_end != '0000-00-00'): ?>
            <h3>
                <i class="fas fa-calendar-alt"></i> <?= DoingsModelDoings::convDate($evento->date_start, $evento->date_end); ?>
                <?php if (DoingsModelDoings::convHour($evento->hour_start, $evento->hour_end)): ?>
                    <span>(<?= DoingsModelDoings::convHour($evento->hour_start, $evento->hour_end); ?>)</span>
                <?php endif; ?>
            </h3>
	    <p><b>Data: </b><?= DoingsModelDoings::convDate($evento->date_start, $evento->date_end); ?></p>
	    <p><b>Hor&aacute;rio: </b><?= DoingsModelDoings::convHour($evento->hour_start, $evento->hour_end); ?></p>

        <?php endif; ?>
	<?php if (!empty($evento->local)): ?>
            <p><b>Local: </b><?php echo $evento->local; ?></p>
        <?php endif; ?>

        

        <?php if ($evento->contact): ?>
              <p><b>Contato: </b><?= $evento->contact; ?></p>
        <?php endif; ?>

	<?php if (!empty($evento->description)): ?>
	    	<p><b>Informações: </b></p>
        	<p><?php echo $evento->description; ?></p>
        <?php endif; ?>


    </div>
<?php endforeach; ?>

<script>
    jQuery(function ($) {
        $(window).on('resize', function () {

            $('.evento-img').each(function () {
                $(this).height($(this).width());
            });

        }).trigger('resize');
    });
</script>