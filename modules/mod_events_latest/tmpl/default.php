<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_events_latest
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JLoader::registerPrefix('DoingsModel', JPATH_SITE . '/components/com_doings/models');

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
?>
<div id="latest-list" class="latest<?php echo $moduleclass_sfx; ?>">
    <h1>
        <a href="<?= JRoute::_('index.php?Itemid=' . $params->get('menuevent')) ?>"><?= $module->title ?></a>
    </h1>
    <div id="all-latest">
        <?php foreach ($events as $doing) : ?>
            <div class="latest">
                <div class="data">
                    <a href="<?php echo JRoute::_('index.php?Itemid=' . $params->get('menuevent')).'/evento/' . $doing->id; ?>">
                        <span>
                            <?php echo strftime('%b', strtotime($doing->date_start)); ?>
                        </span>
                        <span>
                            <?php echo strftime('%d', strtotime($doing->date_start)); ?>
                        </span>
                    </a>
                </div>
                <h2>
                    <a href="<?php echo JRoute::_('index.php?Itemid=' . $params->get('menuevent')).'/evento/' . $doing->id; ?>">
                        <?php echo $doing->name; ?>
                    </a>
                </h2>
                <p>
                    <?= DoingsModelDoings::convDate($doing->date_start, $doing->date_end); ?>
                    <small>
                        <?= DoingsModelDoings::convHour($doing->hour_start, $doing->hour_end); ?>
                    </small>
                </p>
            </div>
        <?php endforeach; ?>
    </div>
    <div>
        <p class="all-events">
            <a href="<?= JRoute::_('index.php?Itemid='.$params->get('menuevent')) ?>" class="btn btn-all-events">
                Agenda completa <i class="fas fa-angle-double-right"></i>
            </a>
        </p>
    </div>
</div>