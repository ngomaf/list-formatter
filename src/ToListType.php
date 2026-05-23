<?php declare(strict_types=1);

namespace Ngomafortuna\ListFormatter;

use stdClass;

class ToListType
{
    /**
     * Use foreach, probably slower
     */
    public static function toObj(array $list): object
    {
        $newList = new \stdClass;
        
        if(!$list) {
            $newList->error = "The param @list can not be empty";
            return $newList;
        }
        
        foreach($list as $key => $value) {
            $newList->$key = (object)$value;
        }

        $list = $newList;

        return $list;
    }

    /**
     * User json_encode end json_decode, probably faster
     */
    public static function toObject(array $list): object
    {
        
        if(!$list) {
            $obj = new \stdClass;
            $obj->error = "The param @list can not be empty";
            return $obj;
        }

        return (object) json_decode(json_encode($list));
    }

    public static function toArray(object $list): array
    {        
        if(empty($list)) {
            $array['error'] = "The param @list can not be empty";
            return $array;
        }

        return json_decode(json_encode($list), true);
    }
}
