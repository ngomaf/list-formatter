<?php declare(strict_types=1);

use Ngomafortuna\ListFormatter\ToListType;
use Ngomafortuna\ListFormatter\Order;
use PHPUnit\Framework\TestCase;

final class OrderTest extends TestCase
{
    private array $list;
    private array $listEsc;
    private array $listDesc;
    private Order $order;
    private stdClass $obList;
    private ToListType $template;

    #[Override]
    public function setUp(): void
    {
        parent::setUp();

        $this->template = new ToListType();

        $this->order = new Order;


        $this->list = [
            ['id' => 1, 'name' => 'Love', 'slug' => 'love'],
            ['id' => 3, 'name' => 'Feeling', 'slug' => 'feeling'],
            ['id' => 2, 'name' => 'Hope', 'slug' => 'hope'],
        ];
        
        $this->listEsc = [
            ['id' => 3, 'name' => 'Feeling', 'slug' => 'feeling'],
            ['id' => 2, 'name' => 'Hope', 'slug' => 'hope'],
            ['id' => 1, 'name' => 'Love', 'slug' => 'love'],
        ];
        
        $this->listDesc = [
            ['id' => 1, 'name' => 'Love', 'slug' => 'love'],
            ['id' => 2, 'name' => 'Hope', 'slug' => 'hope'],
            ['id' => 3, 'name' => 'Feeling', 'slug' => 'feeling'],
        ];

        $this->obList = $this->template::toObject($this->list);

    }

    public function test_ascending_order_object()
    {
        $this->assertEquals($this->template::toObj($this->listEsc), $this->order::get($this->template::toObj($this->list), 'name'));
    }

    public function test_ascending_order_array(): void
    {
        $this->assertSame($this->listEsc, $this->order::get($this->list, 'name'));
    }

    public function test_error_ascending_order_with_list_empty()
    {
        $this->assertSame("The @reference or @list can not be empty.", $this->order::get([], ''));
    }

    public function test_error_ascending_order_with_reference_empty()
    {
        $this->assertSame("The @reference or @list can not be empty.", $this->order::get($this->list, ''));
    }

    public function test_error_ascending_order_with_list_end_reference_empty()
    {
        $this->assertSame("The @reference or @list can not be empty.", $this->order::get(new stdClass, ''));
    }

    public function test_descending_order_object()
    {
        $this->assertEquals($this->template::toObj($this->listDesc), $this->order::getReverse($this->obList, 'name'));
    }

    public function test_descending_order_array()
    {
        $this->assertEquals($this->listDesc, $this->order::getReverse($this->list, 'name'));
    }

    public function test_error_descending_order_with_list_empty()
    {
        $this->assertSame("The @reference or @list can not be empty.", $this->order::getReverse([], ''));
    }

    public function test_error_descending_order_with_reference_empty()
    {
        $this->assertSame("The @reference or @list can not be empty.", $this->order::getReverse($this->list, ''));
    }

    public function test_error_descending_order_with_list_end_reference_empty()
    {
        $this->assertSame("The @reference or @list can not be empty.", $this->order::getReverse(new stdClass, ''));
    }
}