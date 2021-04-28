<?php
defined('_JEXEC') or die;

$controller = JControllerLegacy::getInstance('Doings');
$controller->execute(JRequest::getVar('task', 'click'));
$controller->redirect();
