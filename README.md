# List formatter

List formatter is a component with three main functions: (1) convert data in list format (array/object) to text, separating them by commas; (2) sort in ascending or descending order; and (3) convert lists from array format to object and vice-versa.

(Formatador de listas é um componente, com três funções principais (1) converter dados em formato de lista (array/objecto) para texto separando-os por vírgulas, (2) Ordenar de forma crescente ou decrescente e (3) converter listas do formato de array para objecto e vice-versa)

This component have 3 features:

1. ListToString: To convert a list in array or object format into a string with each item separated by a comma, or also to add a hyperlink to each item. (para converter lista em formato de array ou objecto em string com cada item separado por vírgula ou ainda colocar um hiperlink para cada item).
    - get: Returns a string, with each item separated by a comma. (retorna um string, com cada item separado por vígula)
    - getWithLink: Returns a string, with each item as a hyperlink separated by a comma. (retorna um string, com cada item com hiperlink separado por vírgula)

2. Order: to order array or object list, for two options ascending end descending. (Para ordenar elementos de uma lista, de forma crescente ou decrecente).
    - get: return list in asc order (retorna uma lista em ordem crescente)
    - getReverse: return list in desc order (retorna uma lista em ordem decrescente)

3. ToListType: Converts object to array and vice-versa. (Converte objecto em array e vice-versa)
    - toObject
    - toArray

## Require

Necessary PHP 8.0 or more (Necessário PHP 8.0 ou superior)

## Install

composer require ngomafortuna/list-formatter

## Syntax and mode of use

```php
ListToString::get($array, 'array_key');
ListToString::getWithLink($array, ['array_key', 'array_key'], 'url');
```

```php
Order::get($array, 'array_key');
Order::getReverse($array, 'array_key');
```

```php
ToListType::toObject($array);
ToListType::toArray($object);
```

## Example

```php
use Ngomafortuna\ListFormatter\ListToString;
use Ngomafortuna\ListFormatter\Order;
use Ngomafortuna\ListFormatter\ToListType;

$arrayLIst = [
    ['title' => 'Socieda', 'slug'=> 'sociedade','date' => '2024-76-06'],
    ['title' => 'Vestimentas', 'slug'=> 'vestimentas', 'date' => '2024-06-06'],
    ['title' => 'Cultura', 'slug'=> 'cultura','date' => '2025-06-06'],
];
```

### Transforme array or object list to string

```php
$list = ListToString::get($arrayLIst, 'title');
$list_with_link = ListToString::getWithLink($arrayLIst, ['title', 'slug'], 'https://www.minharosa.ao');

var_dump($list, $list_with_link);
```

Result

```shell
string(29) "Socieda, Vestimentas, Cultura"

string(176) "<a href='https://www.minharosa.ao/sociedade'>Socieda</a>, <a href='https://www.minharosa.ao/vestimentas'>Vestimentas</a>, <a href='https://www.minharosa.ao/cultura'>Cultura</a>"
```

### Order array or object list

```php
$order = Order::get($arrayLIst, 'title');
$order_reverse = Order::getReverse($arrayLIst, 'title');

var_dump($order, $order_reverse);
```

Result

```shell
array(3) {
  [0]=>
  array(3) {
    ["title"]=>
    string(7) "Cultura"
    ["slug"]=>
    string(7) "cultura"
    ["date"]=>
    string(10) "2025-06-06"
  }
  [1]=>
  array(3) {
    ["title"]=>
    string(7) "Socieda"
    ["slug"]=>
    string(9) "sociedade"
    ["date"]=>
    string(10) "2024-76-06"
  }
  [2]=>
  array(3) {
    ["title"]=>
    string(11) "Vestimentas"
    ["slug"]=>
    string(11) "vestimentas"
    ["date"]=>
    string(10) "2024-06-06"
  }
}

array(3) {
  [0]=>
  array(3) {
    ["title"]=>
    string(11) "Vestimentas"
    ["slug"]=>
    string(11) "vestimentas"
    ["date"]=>
    string(10) "2024-06-06"
  }
  [1]=>
  array(3) {
    ["title"]=>
    string(7) "Socieda"
    ["slug"]=>
    string(9) "sociedade"
    ["date"]=>
    string(10) "2024-76-06"
  }
  [2]=>
  array(3) {
    ["title"]=>
    string(7) "Cultura"
    ["slug"]=>
    string(7) "cultura"
    ["date"]=>
    string(10) "2025-06-06"
  }
}
```

### Convert array list to object end object list to array

```php
$conv_to_object = ToListType::toObject($arrayLIst);

// create object to convert
$listObj = [];
foreach($arrayLIst as $item) {
    $objModel = new \stdClass();
    $objModel->title = $item['title']; $objModel->slug =  $item['slug']; $objModel->date = $item['date']; $listObj[] = $objModel;
}
$listObj = (object) $listObj;
$conv_to_array = ToListType::toArray($listObj);

var_dump($conv_to_object, $conv_to_array);
```

Result

```shell
object(stdClass)#6 (3) {
  ["0"]=>
  object(stdClass)#2 (3) {
    ["title"]=>
    string(7) "Socieda"
    ["slug"]=>
    string(9) "sociedade"
    ["date"]=>
    string(10) "2024-76-06"
  }
  ["1"]=>
  object(stdClass)#4 (3) {
    ["title"]=>
    string(11) "Vestimentas"
    ["slug"]=>
    string(11) "vestimentas"
    ["date"]=>
    string(10) "2024-06-06"
  }
  ["2"]=>
  object(stdClass)#5 (3) {
    ["title"]=>
    string(7) "Cultura"
    ["slug"]=>
    string(7) "cultura"
    ["date"]=>
    string(10) "2025-06-06"
  }
}

array(3) {
  [0]=>
  array(3) {
    ["title"]=>
    string(7) "Socieda"
    ["slug"]=>
    string(9) "sociedade"
    ["date"]=>
    string(10) "2024-76-06"
  }
  [1]=>
  array(3) {
    ["title"]=>
    string(11) "Vestimentas"
    ["slug"]=>
    string(11) "vestimentas"
    ["date"]=>
    string(10) "2024-06-06"
  }
  [2]=>
  array(3) {
    ["title"]=>
    string(7) "Cultura"
    ["slug"]=>
    string(7) "cultura"
    ["date"]=>
    string(10) "2025-06-06"
  }
}
```
