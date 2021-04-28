<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_representadas
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once dirname(__FILE__).'/helper.php';

$document = JFactory::getDocument();
$document->addStyleSheet(JURI::base(true) . '/modules/mod_banner_clean/assets/css/style.css');

$color = $params->get('color');
$module = JModuleHelper::getModule('banner_clean');

require JModuleHelper::getLayoutPath('mod_banner_clean', $params->get('layout', 'default'));