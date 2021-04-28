<?php

defined('_JEXEC') or die;

class modEventsLatestHelper
{
    public static function getEventsLatest($params)
    {
        $count = $params->get('count');
        $db = JFactory::getDBO();
        $date = date('Y-m-d');
        $query = $db->getQuery(true);
        $query->select('*');
        $query->from('#__doings As d');
        $query->where('d.published = 1');
        $query->where('(d.date_start >= "' . $date . '" OR d.date_end >= "' . $date . '")');
        $query->order('d.date_start');
        $query->setLimit($count);
        $db->setQuery($query);
        $rows = $db->loadObjectList();
        return $rows;
    }

}