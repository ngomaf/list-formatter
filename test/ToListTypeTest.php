<?php declare(strict_types=1);

use Ngomafortuna\ListFormatter\ToListType;
use PHPUnit\Framework\TestCase;

final class ToListTypeTest extends TestCase
{
    private array $list;
    private stdClass $objList;
    private ToListType $converter;

    #[Override]
    public function setUp(): void
    {
        parent::setUp();

        $this->converter = new ToListType;

        $this->list = [
            ['id' => 1, 'name' => 'Love', 'slug' => 'love'],
            ['id' => 3, 'name' => 'Feeling', 'slug' => 'feeling'],
            ['id' => 2, 'name' => 'Hope', 'slug' => 'hope'],
        ];

        $list2 = [];

        foreach($this->list as $item) {
            $objModel = new \stdClass();
    
            $objModel->id = $item['id'];
            $objModel->name =  $item['name'];
            $objModel->slug = $item['slug'];

            $list2[] = $objModel;
        }

        $this->objList = (object) $list2;
    }

    public function test_error_convert_array_to_object_with_list_empty()
    {
        $request = new stdClass();
        $request->error = "The param @list can not be empty";

        $this->assertEquals($request, $this->converter::toObject([]));
    }

    public function test_convert_array_to_object()
    {
        $this->assertEquals($this->objList, $this->converter::toObject($this->list));
    }

    public function test_error_convert_array_to_obj_with_list_empty()
    {
        $request = new stdClass();
        $request->error = "The param @list can not be empty";

        $this->assertEquals($request, $this->converter::toObj([]));
    }

    public function test_convert_array_to_obj()
    {
        $this->assertEquals($this->objList, $this->converter::toObj($this->list));
    }

    public function test_error_convert_object_to_array_with_list_empty()
    {
        $request['error'] = "The param @list can not be empty";

        $this->assertEquals($request, $this->converter::toArray((new stdClass)));
    }

    public function test_convert_object_to_array()
    {
        $this->assertSame($this->list, $this->converter::toArray($this->objList));
    }
}