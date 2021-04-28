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
class ClubsHelper extends JHelperContent
{
    public static function addSubmenu($vName)
    {
        JHtmlSidebar::addEntry(
            JText::_('COM_CLUBS_SUBMENU_CLUBS'),
            'index.php?option=com_clubs&view=clubs',
            $vName == 'clubs'
        );
        JHtmlSidebar::addEntry(
            JText::_('COM_CLUBS_SUBMENU_CATEGORIES'),
            'index.php?option=com_categories&extension=com_clubs',
            $vName == 'categories'
        );

    }

}
