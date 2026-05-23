<?php

namespace Ngomafortuna\ListFormatter;

use stdClass;


class ToListType
{
    /**
     * Use foreach, probably slower
     */
    public static function toObject(array $list): object
    {
        $newList = new stdClass;
        
        foreach($list as $key => $value) {
            $newList->$key = (object)$value;
        }

        $list = $newList;

        return $list;
    }

    /**
     * User json_encode end json_decode, probably faster
     */
    public static function toObj(array $list): object
    {
        return (object) json_decode(json_encode($list));
    }

    public static function toArray(object $list): array
    {
        return json_decode(json_encode($list), true);
    }
}
