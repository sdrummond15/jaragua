<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_club
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once dirname(__FILE__) . '/helper.php';
$document = JFactory::getDocument();
$document->addStyleSheet(JURI::base(true) . '/modules/mod_jarajob/assets/css/style.css');
$document->addScript(JURI::base(true) . '/modules/mod_jarajob/assets/js/script.js');
$clubs = modClubHelper::getClub();
$module = JModuleHelper::getModule( 'jarajob' );

require JModuleHelper::getLayoutPath('mod_jarajob', $params->get('layout', 'default'));
