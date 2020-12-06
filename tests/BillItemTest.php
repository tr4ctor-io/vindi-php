<?php

namespace Vindi\Test;

use stdClass;
use Vindi\ApiRequester;
use Vindi\BillItem;

class BillItemTest extends ResourceTest
{
    public function setUp(): void
    {
        $this->resource = $this->getMockForAbstractClass(BillItem::class);
        $this->resource->apiRequester = $this->getMockBuilder(ApiRequester::class)->getMock();
    }

    /** @test */
    public function it_should_have_an_endpoint()
    {
        $this->assertSame($this->resource->endpoint(), 'bill_items');
    }
}
