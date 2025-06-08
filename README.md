# List formatter
Formatter from composite datas in list format. This library receive list like a database format (Formatador de dados compostos em formato de lista. Esta biblioteca recebe listas em formato de base de dados)


This component have two features:
- InLine: to formatter array or object list in string in line or list of hiperlink 
  (para formatar lista de array or object em string en linha ou hiperlinks)
- Order: to order array or object list, for two options:
  (Para ordenar elementos de uma lista)
    - get: return list in asc order (retorna uma lista em ordem crescente)
    - rGet: return list in desc order (retorna uma lista em ordem decrescente)

## Require
Necessary PHP 8.0 or more (Necessário PHP 8.0 ou superior)

## Install
composer require ngomafortuna/list-formatter

## Syntax and mode of use
```php
$list = InLine::get($notices, ['title']);
$list1 = InLine::get($notices, ['title', 'slug'], 'https://www.minharosa.ao');

$order = Order::get($arrayLIst, 'title');
$order1 = Order::rGet($arrayLIst, 'title');
```

## Example
```php
use Ngomafortuna\ListFormatter\InLine;
use Ngomafortuna\ListFormatter\Order;

$arrayLIst = [
    ['title' => 'Vestimentas', 'date' => '2024-06-06', 'image' => 'photo1.jpg'],
    ['title' => 'Cultura','date' => '2025-06-06','image' => 'photo3.jpg'],
    ['title' => 'Socieda','date' => '2024-76-06','image' => 'photo2.jpg']
];

// TRANSFORM ARRAY OR OBJECT LIST IN LINE (STRING)
$list = InLine::get($arrayLIst, ['title']);
$list1 = InLine::get($arrayLIst, ['title', 'slug'], 'https://www.minharosa.ao');

// ORDER ARRAY OR OBJECT
$order = Order::get($arrayLIst, 'title');
$order1 = Order::rGet($arrayLIst, 'title');

var_dump($list, $list1);

var_dump($order, $order1);
```

Results
```shell
string(102) "Caála, História, Economia Infraestrutura e Esportes, Divisão administrativa do Município da Caála"

string(340) "<a href='https://www.minharosa.aocaala'>Caála</a>, <a href='https://www.minharosa.aohistoria'>História</a>, <a href='https://www.minharosa.aoeconomia-e-infraestrutura'>Economia Infraestrutura e Esportes</a>, <a href='https://www.minharosa.aodivisao-administrativa-do-municipio-da-caala'>Divisão administrativa do Município da Caála</a>"


object(stdClass)#7 (3) {
  ["0"]=>
  object(stdClass)#5 (3) {
    ["title"]=>
    string(7) "Cultura"
    ["date"]=>
    string(10) "2025-06-06"
    ["image"]=>
    string(10) "photo3.jpg"
  }
  ["1"]=>
  object(stdClass)#6 (3) {
    ["title"]=>
    string(7) "Socieda"
    ["date"]=>
    string(10) "2024-76-06"
    ["image"]=>
    string(10) "photo2.jpg"
  }
  ["2"]=>
  object(stdClass)#2 (3) {
    ["title"]=>
    string(11) "Vestimentas"
    ["date"]=>
    string(10) "2024-06-06"
    ["image"]=>
    string(10) "photo1.jpg"
  }
}

object(stdClass)#11 (3) {
  ["0"]=>
  object(stdClass)#9 (3) {
    ["title"]=>
    string(7) "Cultura"
    ["date"]=>
    string(10) "2025-06-06"
    ["image"]=>
    string(10) "photo3.jpg"
  }
  ["1"]=>
  object(stdClass)#10 (3) {
    ["title"]=>
    string(7) "Socieda"
    ["date"]=>
    string(10) "2024-76-06"
    ["image"]=>
    string(10) "photo2.jpg"
  }
  ["2"]=>
  object(stdClass)#8 (3) {
    ["title"]=>
    string(11) "Vestimentas"
    ["date"]=>
    string(10) "2024-06-06"
    ["image"]=>
    string(10) "photo1.jpg"
  }
}
```


