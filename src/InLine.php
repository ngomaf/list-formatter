<?php

namespace Ngomafortuna\ListFormatter;

use stdClass;


/**
 * <b>InLine</b>
 * This class is a helper, to transform array or object in line string, and with possiblety of the set link in the items
 * 
 * copyright (c) 2025, ngoma m. fortuna of the mostarda tec
 */
class InLine
{
    /**
     * The @param $params need two item when you use @param $url. 
     * Ex.: ['name', 'id'] or ['name', 'slug'],
     */
    public static function get(object|array $list, array $params, ?string $url = null) : string
    {
        if(is_array($list)) {
            $newList = new stdClass;
            
            foreach($list as $key => $value) {
                $newList->$key = (object)$value;
            }

            $list = $newList;
        }
        
        if(count($params) < 1 || empty($params[0])) { // validate $params
            return '[param_error] The array $params is empty';
        }
        
        if(!empty($url) && count($params) < 2) { // validate $params
            return '[param_error] For user $url you need 2 items in $params';
        }

        $items = [];

        foreach($list as $item) {
            if(!empty($url)) {
                foreach($params as $parm) {
                    $tempArr[] = $item->{$parm};                
                }
    
                $items[] = "<a href='". $url . $tempArr[1] ."'>{$tempArr[0]}</a>";
    
                $tempArr = [];
            }
            
            if(empty($url)) $items[] = $item->{$params[0]};
        }

        return implode(", ", $items);
    }

}