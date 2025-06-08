<?php

use Ngomafortuna\ListFormatter\InLine;
use Ngomafortuna\ListFormatter\Order;

require_once dirname(__FILE__, 2) . "/vendor/autoload.php";
require_once dirname(__FILE__, 2) . "/test/datas.php";
echo PHP_EOL;


$arrayLIst = [
    ['title' => 'Vestimentas', 'date' => '2024-06-06', 'image' => 'photo1.jpg'],
    ['title' => 'Cultura','date' => '2025-06-06','image' => 'photo3.jpg'],
    ['title' => 'Socieda','date' => '2024-76-06','image' => 'photo2.jpg']
];

// $list = InLine::get($notices, ['title']);
// $list1 = InLine::get($notices, ['title', 'slug'], 'https://www.minharosa.ao');

// var_dump($list, $list1);

// $objectLIst = new stdClass;

// foreach($arrayLIst as $key => $value) {
//     $objectLIst->$key = (object)$value;
// }

$order = Order::get($arrayLIst, 'title');

$order1 = Order::get($arrayLIst, 'title');

var_dump($order, $order1);





echo PHP_EOL;
echo PHP_EOL;
