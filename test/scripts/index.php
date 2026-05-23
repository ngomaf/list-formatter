<?php

use Ngomafortuna\ListFormatter\InLine;
use Ngomafortuna\ListFormatter\ToListType;
use Ngomafortuna\ListFormatter\Order;

require_once dirname(__FILE__, 3) . "/vendor/autoload.php";
require_once dirname(__FILE__, 3) . "/test/scripts/datas.php";
echo PHP_EOL;

$arrayLIst = [
    ['title' => 'Socieda','date' => '2024-76-06','image' => 'photo2.jpg'],
    ['title' => 'Vestimentas', 'date' => '2024-06-06', 'image' => 'photo1.jpg'],
    ['title' => 'Cultura','date' => '2025-06-06','image' => 'photo3.jpg'],
];

// $list = InLine::get($notices, ['title']);
// $list1 = InLine::get($notices, ['title', 'slug'], 'https://www.minharosa.ao');

// var_dump($list, $list1);

// $objectLIst = new stdClass;

// foreach($arrayLIst as $key => $value) {
//     $objectLIst->$key = (object)$value;
// }

// $order = Order::get($arrayLIst, 'title');

// $order1 = Order::rget($arrayLIst, 'title');

// var_dump($order, $order1);

$template = new ToListType;
$order = new Order;

// var_dump($template::toObject($arrayLIst) == $template::toObj($arrayLIst));
// var_dump($template::toObject($arrayLIst), [[]], $template::toObj($arrayLIst));

// var_dump($order::get($arrayLIst, 'image'));

var_dump($template::toArray($template::toObj($arrayLIst)));



echo PHP_EOL;
echo PHP_EOL;
