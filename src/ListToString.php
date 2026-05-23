<?php declare(strict_types=1);

namespace Ngomafortuna\ListFormatter;

final class ListToString
{
    /**
     * <b>Tranform list data (array or object) to string<b> 
     * 
     * Ex.: ['love', 'hope', 'feeling'] to 'love, hope, feeling'
     */
    public static function get(object|array $list, string|int $param = 'default'): string
    {
        
        if(count($list) < 1) { // validate $params
            return '[list_error] The @list can not be empty.';
        }

        $items = [];

        foreach($list as $item) {         
            if($param === 'default') {
                $items[] = $item;
                continue;
            }
            
            if(is_object($item)) {
                if(!isset($item->{$param})) {
                    return "[param_error] The @param {$param} not exists in @list.";
                }

                $items[] = $item->{$param};
                continue;
            }

            if(!isset($item[$param])) {
                return "[param_error] The @param {$param} not exists in array @list.";
            }

            $items[] = $item[$param];
        }

        return trim(implode(", ", $items), ',');
    }

    /**
     * The @param $params need two item when you use @param $url. 
     * Ex.: ['name', 'id'] or ['name', 'slug'],
     */
    public static function getWithLink(object|array $list, array $params, string $url) : string
    {
        
        if(count($list) < 1) { // validate $list
            return '[list_error] The @list list can not be empty.';
        }
        
        if(count($params) < 1 || empty($params[0])) { // validate $params
            return '[param_error] The array @params can not be empty.';
        }
        
        if(count($params) < 2) { // validate $params
            return '[param_end_url_error] For user @url you need 2 items in @params.';
        }

        $items = [];

        foreach($list as $item) {
            $tempArr = [];

            foreach($params as $param) {
                if(is_object($item)) {
                    $tempArr[] = $item->{$param};
                    continue;
                }

                $tempArr[] = $item[$param];
            }

            $url = trim($url, '/') . '/';

            $items[] = "<a href='". $url . $tempArr[1] ."'>{$tempArr[0]}</a>";
        }

        return trim(implode(", ", $items), ", ");
    }
}
