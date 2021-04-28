<?php

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.model');


class DoingsModelEvento extends JModelLegacy
{

    public static function getEvento($id = '')
    {
        $id = JRequest::getVar('id');

        $results = '';
        if (!empty($id)) {
            $db = JFactory::getDBO();
            $query = $db->getQuery(true);
            $query->select('*');
            $query->from('#__doings As d');
            $query->where('d.published = 1');
            $query->where('d.id = ' . $id);

            $db->setQuery($query);
            $results = $db->loadObjectList();
        }
        return $results;

    }

}