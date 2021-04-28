<?php



defined('_JEXEC') or die('Restricted access');



jimport('joomla.application.component.model');





class ClubsModelClubs extends JModelLegacy

{



    public static function getClubs($id = '')

    {

        $db = JFactory::getDBO();

        $query = $db->getQuery(true);

        $query->select('cl.*, cat.title AS categoria');

        $query->from('#__clubs As cl');

        $query->join('LEFT', '#__categories As cat ON cat.id = cl.catid');

        $query->where('cl.published = 1');



        if (!empty($id)) {

            $query->where('cl.catid = ' . $id);

        }

	$query->order('categoria, cl.name');

        $db->setQuery($query);

        $item = $db->loadObjectList();



        return $item;

    }



    public static function getCatClubs()

    {

        $db = JFactory::getDBO();

        $query = $db->getQuery(true);

        $query->select('cat.id AS id, cat.title AS categoria');

        $query->from('#__clubs As cl');

        $query->join('LEFT', '#__categories As cat ON cat.id = cl.catid');

        $query->where('cat.published = 1');

        $query->where('cat.extension = "com_clubs"');

        $query->group('cat.id');

	$query->order('categoria');

        $db->setQuery($query);



        $item = $db->loadObjectList();



        return $item;

    }



    public static function getNumero($str) {

        return preg_replace("/[^0-9]/", "", $str);

    }



}