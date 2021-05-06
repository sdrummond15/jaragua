<?php


defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.view');


class ClaimsViewClaims extends JViewLegacy
{

    protected $claims;

    function display($tpl = null)
    {

        $this->claims = $this->get('Claims');
        $this->categories = $this->get('CatClaims');

        $doc = JFactory::getDocument();
        $doc->addStyleSheet('components/com_claims/assets/css/style.css');
        $doc->addScript('components/com_claims/assets/js/jquery.maskedinput.min.js');
        $doc->addScript('components/com_claims/assets/js/scripts.js');
        parent::display($tpl);
    }

}