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
$document->addStyleSheet(JURI::base(true) . '/modules/mod_form_job/assets/css/style.css');
$document->addScript(JURI::base(true) . '/modules/mod_form_job/assets/js/jquery.maskedinput.min.js');
$document->addScript(JURI::base(true) . '/modules/mod_form_job/assets/js/jquery.maskcpfcnpj.js');
$document->addScript(JURI::base(true) . '/modules/mod_form_job/assets/js/scripts.js');

$whatsapp = $params->get('whatsapp');
$enviar = $params->get('button_enviar');
$email_admin = $params->get('email_admin');
$email_form = $params->get('email');
$subject = $params->get('subject');
$sucesso = $params->get('success');
$erro = $params->get('failure');

require JModuleHelper::getLayoutPath('mod_form_job', $params->get('layout', 'default'));

