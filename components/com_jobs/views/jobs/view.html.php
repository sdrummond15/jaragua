<?php


defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');


class JobsViewJobs extends JViewLegacy
{

    protected $jobs;

    function display($tpl = null)
    {

        $this->jobs =      $this->get('Jobs');
        $this->categories = $this->get('CatJobs');

        $doc = JFactory::getDocument();
        $doc->addStyleSheet('components/com_jobs/assets/css/style.css');
        parent::display($tpl);
    }

}