<?php

/**
 * @copyright    Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license        GNU General Public License version 2 or later; see LICENSE.txt
 */


// no direct access

defined('_JEXEC') or die;


/**
 * @package        Joomla.Site
 * @subpackage    mod_qualification
 * @since        1.5
 */
class modWarningsHelper
{
    public static function getWarning($category)
    {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true);
        $query->select('cont.id AS id_article, 
                        cont.title AS titlearticle, 
                        cont.alias AS aliasarticle, 
                        cont.images AS images, 
                        cont.introtext AS intro, 
                        cont.fulltext AS full, 
                        cat.id AS idcategory, 
                        cat.title AS titlecategory, 
                        cat.alias AS aliascategory'
        );
        $query->from('#__content As cont');
        $query->join('LEFT', '#__categories AS cat ON cont.catid = cat.id');
        $query->where('cont.catid = ' . $category );
	$query->where('cont.featured = 1' );
        $query->order('cont.created DESC');

        $db->setQuery($query);
        $rows = (array)$db->loadObjectList();
        shuffle($rows);

        return $rows;
    }
}