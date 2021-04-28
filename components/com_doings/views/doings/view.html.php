<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.view');

class DoingsViewDoings extends JViewLegacy {

    protected $doings;
    protected $filter;

    function display($tpl = null) {

        $this->doings = $this->get('Doings');
        $this->filter = $this->get('Filter');

        $doc = JFactory::getDocument();
        $doc->addStyleSheet('components/com_doings/css/style.css');
        $doc->addScript('components/com_doings/js/script.js');
        parent::display($tpl);
    }
}
