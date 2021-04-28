<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_clubs
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Clubs component helper.
 *
 * @package     Joomla.Administrator
 * @subpackage  com_clubs
 * @since       1.6
 */
class JobsHelper extends JHelperContent
{
    public static function addSubmenu($vName)
    {
        JHtmlSidebar::addEntry(
            JText::_('COM_JOBS_SUBMENU_JOBS'),
            'index.php?option=com_jobs&view=jobs',
            $vName == 'jobs'
        );
        JHtmlSidebar::addEntry(
            JText::_('COM_JOBS_SUBMENU_CATEGORIES'),
            'index.php?option=com_categories&extension=com_jobs',
            $vName == 'categories'
        );

    }

}
