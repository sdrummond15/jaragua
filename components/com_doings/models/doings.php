<?php

defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.model');



class DoingsModelDoings extends JModelLegacy

{



    public static function getDoings($month = '')

    {

        $month = JRequest::getVar('month');



        $db = JFactory::getDBO();



        $date = date('Y-m-d');

        $query = $db->getQuery(true);

        $query->select('*');

        $query->from('#__doings As d');

        $query->where('d.published = 1');



        if($month) {

            $month = substr($month, 0 , 4).'-'.substr($month,  -2).'-01';

            $proxMonth = date('Y-m-d', strtotime("+1 month", strtotime($month)));

            $query->where('(d.date_start BETWEEN "' . $month . '" AND "' . $proxMonth . '") OR 

                           (d.date_end BETWEEN "' . $month . '" AND "' . $proxMonth . '")');

        }else{

            $query->where('(d.date_start >= "'.$date.'" OR d.date_end >= "'.$date.'")');

        }



        $query->order('d.date_start');



        $db->setQuery($query);



        $item = $db->loadObjectList();



        return $item;

    }



    public static function getFilter()

    {

        $db = JFactory::getDBO();



        $date = date('Y-m-d');

        $query = $db->getQuery(true);

        $query->select('*');

        $query->from('#__doings As d');

        $query->where('d.published = 1');

        $query->where('d.date_start >= "'.$date.'" OR d.date_end >= "'.$date.'"');

        $query->order('d.date_start');



        $db->setQuery($query);



        $item = $db->loadObjectList();



        return $item;

    }



    public static function convDate($dateStart = '', $dateEnd = '')

    {

        //Verifica se existem data de início e fim

        $diffDate = 0;

        if($dateStart != '0000-00-00' && $dateEnd != '0000-00-00'){

            $diffDate = date_diff(date_create($dateStart), date_create($dateEnd));

        }



        //Verifica diferença de dias se for diferente de 0

        if(!empty($diffDate)){

            $diffDate = $diffDate->format('%a');

        }



        //Verifica diferença de data maior que 1

        if($diffDate > 1){

            $data = self::revertDate($dateStart) . ' à ' . self::revertDate($dateEnd);

        }

        //Verifica diferença de data igual a 1

        elseif ($diffDate == 1){

            $data = self::revertDate($dateStart) . ' e ' . self::revertDate($dateEnd);

        }

        //Verifica diferença de data menor que 1

        else{

            $data = self::revertDate($dateStart);

        }



        return $data;



    }



    public static function convHour($hourStart = '', $hourEnd = '')

    {



        if(($hourStart != '00:00:00' && $hourEnd != '00:00:00') && $hourStart != $hourEnd ){

            $hour = 'de ' . self::removeHour($hourStart) . ' às ' . self::removeHour($hourEnd);

        }elseif (($hourStart != '00:00:00' && $hourEnd != '00:00:00') && ($hourStart == $hourEnd)){

            $hour = 'às ' . self::removeHour($hourStart);

        }elseif ($hourStart == '00:00:00' && $hourEnd != '00:00:00'){

            $hour = 'até ' . self::removeHour($hourEnd);

        }elseif ($hourStart != '00:00:00' && $hourEnd == '00:00:00'){

            $hour = 'a partir de ' . self::removeHour($hourStart);

        }else{

            $hour = '';

        }



        return $hour;



    }



    public static function revertDate($date)

    {

        $dateStart = explode('-',$date);

        return $dateStart[2].'/'.$dateStart[1].'/'.$dateStart[0];

    }



    public static function removeHour($hour)

    {

        $h = '';

        if(substr($hour,3,2) == '00'){

            
        }

        return substr($hour,0,5) . $h;

    }



}