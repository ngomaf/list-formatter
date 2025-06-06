<?php

namespace Ngomafortuna\ListFormatter;


/**
 * <b>Order</b>
 * This class is a helper, to sort list 
 * 
 * copyright (c) 2025, ngoma m. fortuna of the mostarda tec
 */
class Order extends ListTemplate
{
    public static function get(object|array $list, string $reference): object
    {
        $ordList = array();
        $token = false;
        
        $list = self::objectValidate($list);
        
        foreach($list as $key => $item) {
        
            if($key == 0) array_push($ordList, $item);
        
            if($key > 0) {
        
                foreach($ordList as $key => $orderItem) {
                    if($item->{$reference} < $orderItem->{$reference}) {
                        array_splice($ordList, $key, 0, array($item));
                        $token = true;
                        break;
                    }
                } 
            
                if(!$token) array_push($ordList, $item);
                $token = false;
        
            }
        
        }
        
        return (object) $ordList;
    }

    public static function rGet(object|array $list, string $reference): object
    {
        $ordList = array();
        $token = false;
        
        $list = self::objectValidate($list);
        
        foreach($list as $key => $item) {
        
            if($key == 0) array_push($ordList, $item);
        
            if($key > 0) {
        
                foreach($ordList as $key => $orderItem) {
                    if($item->{$reference} > $orderItem->{$reference}) {
                        array_splice($ordList, $key, 0, array($item));
                        $token = true;
                        break;
                    }
                } 
            
                if(!$token) array_push($ordList, $item);
                $token = false;
        
            }
        
        }
        
        return (object) $ordList;
    }

}