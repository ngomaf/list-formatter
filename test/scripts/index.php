<?php

use Ngomafortuna\ListFormatter\ListToString;
use Ngomafortuna\ListFormatter\Order;
use Ngomafortuna\ListFormatter\ToListType;

require_once dirname(__FILE__, 3) . "/vendor/autoload.php";
require_once dirname(__FILE__, 3) . "/test/scripts/datas.php";
echo PHP_EOL;

$arrayLIst = [
    ['title' => 'Socieda', 'slug'=> 'sociedade','date' => '2024-76-06'],
    ['title' => 'Vestimentas', 'slug'=> 'vestimentas', 'date' => '2024-06-06'],
    ['title' => 'Cultura', 'slug'=> 'cultura','date' => '2025-06-06'],
];

// ListToString
var_dump(ListToString::get($arrayLIst, 'title'));
var_dump(ListToString::getWithLink($arrayLIst, ['title', 'slug'], 'https://www.minharosa.ao'));

// ListToString
var_dump(Order::get($arrayLIst, 'title'));
var_dump(Order::getReverse($arrayLIst, 'title'));

// ListToString

$listObj = [];

foreach($arrayLIst as $item) {
    $objModel = new \stdClass();
    $objModel->title = $item['title']; $objModel->slug =  $item['slug']; $objModel->date = $item['date']; $listObj[] = $objModel;
}
$listObj = (object) $listObj;

var_dump(ToListType::toObject($arrayLIst));
var_dump(ToListType::toArray($listObj));


echo PHP_EOL;
echo PHP_EOL;
