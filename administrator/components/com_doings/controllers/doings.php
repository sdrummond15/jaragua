<?php
/**
 * @copyright	Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controlleradmin');
jimport('phpexcel.library.PHPExcel');

class DoingsControlLerDoings extends JControllerAdmin
{
   
    public function __construct($config = array())
	{
		parent::__construct($config);
	}

    public function getModel($name='Doing', $prefix = 'DoingsModel', $config = array('ignore_request'=>true))
    {
        $model = parent::getModel($name, $prefix, $config);
        return $model;
    }
}