<?php

use Ngomafortuna\ListFormatter\InLine;

require_once dirname(__FILE__, 2) . "/vendor/autoload.php";
require_once dirname(__FILE__, 2) . "/test/datas.php";
echo PHP_EOL;


$list = InLine::get($notices, ['title']);
// $list = InLine::get($notices, ['title', 'slug'], 'https://www.minharosa.ao');

var_dump($list);









echo PHP_EOL;
echo PHP_EOL;
