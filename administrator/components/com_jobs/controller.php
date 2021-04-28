<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_clubs
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

jimport('joomla.application.component.controller');

class JobsController extends JControllerLegacy
{
    protected $default_view = 'jobs';
    
    public function display($cachable = false, $urlparams = false)
    {
    
        require_once JPATH_COMPONENT.'/helpers/jobs.php';
        
        JobsHelper::addSubmenu(JRequest::getCmd('view','jobs'));
        
        $view = JRequest::getCmd('view', 'jobs');
        $layout = JRequest::getCmd('layout', 'default');
        $view = JRequest::getCmd('id');
        
        parent::display();
        
        return $this;

    }
}
