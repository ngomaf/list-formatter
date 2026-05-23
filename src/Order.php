<?php

namespace Ngomafortuna\ListFormatter;

use stdClass;

/**
 * <b>Order</b>
 * This class is a helper, to sort list 
 * 
 * copyright (c) 2025, ngoma m. fortuna of the mostarda tec
 */
class Order
{
    public static function get(object|array $list, string $reference): mixed
    {
        if(! $reference || ! $list) return "The @reference or @list can not be empty.";

        $ordList = array();
        $token = false;
        
        if(is_object($list)) {
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

        foreach($list as $key => $item) {
        
            if($key == 0) array_push($ordList, $item);
        
            if($key > 0) {
        
                foreach($ordList as $key => $orderItem) {
                    if($item[$reference] < $orderItem[$reference]) {
                        array_splice($ordList, $key, 0, array($item));
                        $token = true;
                        break;
                    }
                } 
            
                if(!$token) array_push($ordList, $item);
                $token = false;
        
            }
        
        }

        return $ordList;        
    }

    public static function getReverse(object|array $list, string $reference): mixed
    {
        if(! $reference || ! $list) return "The @reference or @list can not be empty.";
        
        $ordList = array();
        $token = false;

        if(is_array($list)) {
            foreach($list as $key => $item) {
            
                if($key == 0) array_push($ordList, $item);
            
                if($key > 0) {
            
                    foreach($ordList as $key => $orderItem) {
                        if($item[$reference] > $orderItem[$reference]) {
                            array_splice($ordList, $key, 0, array($item));
                            $token = true;
                            break;
                        }
                    } 
                
                    if(!$token) array_push($ordList, $item);
                    $token = false;
                }
            }
            
            return $ordList;
        }
        
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