<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_events_latest
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

require_once dirname(__FILE__).'/helper.php';

$document = JFactory::getDocument();
$document->addStyleSheet(JURI::base(true) . '/modules/mod_events_latest/assets/css/style.css');
//$document->addScript(JURI::base(true) . '/modules/mod_events_latest/assets/js/scripts.js');

$events = ModEventsLatestHelper::getEventsLatest($params);
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');

require JModuleHelper::getLayoutPath('mod_events_latest', $params->get('layout', 'default'));
