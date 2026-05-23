<?php declare(strict_types=1);

use Ngomafortuna\ListFormatter\ListToString;
use PHPUnit\Framework\TestCase;


final class ListToStringTest extends TestCase
{
    // test method transform

    public function test_transform_arraylist_string(): void
    {
        $list = ['love', 'hope', 'feeling'];

        $transformator = new ListToString();

        $transformed = $transformator::get($list);

        $this->assertEquals('love, hope, feeling', $transformed);
    }

    public function test_transform_compost_arraylist_string(): void
    {
        $list = [
            [
                'id' => 1,
                'name' => 'Love',
                'slug' => 'love',
            ], 
            [
                'id' => 2,
                'name' => 'Hope',
                'slug' => 'hope',
            ], 
            [
                'id' => 3,
                'name' => 'Feeling',
                'slug' => 'feeling',
            ]
        ];

        $transformator = new ListToString();

        $transformed = $transformator::get($list, 'slug');

        $this->assertEquals('love, hope, feeling', $transformed);
    }

    public function test_transform_objectlist_string(): void
    {
        $jsonString = json_encode([
            ['id' => 1, 'name' => 'Love', 'slug' => 'love'],
            ['id' => 2, 'name' => 'Hope', 'slug' => 'hope'],
            ['id' => 3, 'name' => 'Feeling', 'slug' => 'feeling']
        ]);

        $list = json_decode($jsonString);

        $transformator = new ListToString();

        $transformed = $transformator::get($list, 'slug');

        $this->assertEquals('love, hope, feeling', $transformed);
    }

    public function test_transform_arraylist_error_array_empty(): void
    {
        $list = [];

        $transformator = new ListToString($list);

        $transformed = $transformator::get($list);

        $this->assertEquals('[list_error] The @list can not be empty.', $transformed);
    }

    public function test_transform_objectlist_error_param_not_exists(): void
    {
        $jsonString = json_encode([
            ['id' => 1, 'name' => 'Love', 'slug' => 'love'],
            ['id' => 2, 'name' => 'Hope', 'slug' => 'hope'],
            ['id' => 3, 'name' => 'Feeling', 'slug' => 'feeling']
        ]);

        $list = json_decode($jsonString);

        $transformator = new ListToString();

        $transformed = $transformator::get($list, 'love');

        $this->assertEquals('[param_error] The @param love not exists in @list.', $transformed);
    }

    public function test_transform_arraytlist_error_param_not_exists(): void
    {
        $list = [
            ['id' => 1, 'name' => 'Love', 'slug' => 'love'],
            ['id' => 2, 'name' => 'Hope', 'slug' => 'hope'],
            ['id' => 3, 'name' => 'Feeling', 'slug' => 'feeling']
        ];

        $transformator = new ListToString();

        $transformed = $transformator::get($list, 'love');

        $this->assertEquals('[param_error] The @param love not exists in array @list.', $transformed);
    }


    // test method transformWithLink

    public function test_transformWithLink_arraylist_to_string(): void
    {
        $list = [
            ['id' => 1, 'name' => 'Love', 'slug' => 'love'],
            ['id' => 2, 'name' => 'Hope', 'slug' => 'hope'],
            ['id' => 3, 'name' => 'Feeling', 'slug' => 'feeling']
        ];

        $expected = "<a href='ngoma.ao/love'>Love</a>, <a href='ngoma.ao/hope'>Hope</a>, <a href='ngoma.ao/feeling'>Feeling</a>";

        $transformed = new ListToString();

        $transformed = $transformed->getWithLink($list, ['name', 'slug'], 'ngoma.ao/');

        $this->assertEquals($expected, $transformed);
    }

    public function test_transformWithLink_objectlist_to_string(): void
    {
        $jsonString = json_encode([
            ['id' => 1, 'name' => 'Love', 'slug' => 'love'],
            ['id' => 2, 'name' => 'Hope', 'slug' => 'hope'],
            ['id' => 3, 'name' => 'Feeling', 'slug' => 'feeling'],
        ]);

        $list = json_decode($jsonString);

        $expected = "<a href='ngoma.ao/love'>Love</a>, <a href='ngoma.ao/hope'>Hope</a>, <a href='ngoma.ao/feeling'>Feeling</a>";

        $transformed = new ListToString();

        $transformed = $transformed->getWithLink($list, ['name', 'slug'], 'ngoma.ao/');

        $this->assertEquals($expected, $transformed);
    }

    public function test_transformWithLink_arraylist_error_param_empty(): void
    {
        $list = ['ssss'];

        $transformator = new ListToString($list);

        $transformed = $transformator::getWithLink($list, [], 'ngoma.ao/');

        $this->assertEquals('[param_error] The array @params can not be empty.', $transformed);
    }

    public function test_transformWithLink_arraylist_error_param_1_empty(): void
    {
        $list = ['aaaa'];

        $transformator = new ListToString($list);

        $transformed = $transformator::getWithLink($list, ['id'], 'ngoma.ao/');

        $this->assertEquals('[param_end_url_error] For user @url you need 2 items in @params.', $transformed);
    }

    public function test_transformWithLink_arraylist_error_list_empty(): void
    {
        $list = [];

        $transformator = new ListToString($list);

        $transformed = $transformator::getWithLink($list, ['id', 'slug'], 'ngoma.ao/');

        $this->assertEquals('[list_error] The @list list can not be empty.', $transformed);
    }
}