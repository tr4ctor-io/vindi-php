<?php

namespace Vindi\Test;

use stdClass;
use Vindi\ApiRequester;
use Vindi\Period;

class PeriodTest extends ResourceTest
{
    public function setUp(): void
    {
        $this->resource = $this->getMockForAbstractClass(Period::class);
        $this->resource->apiRequester = $this->getMockBuilder(ApiRequester::class)->getMock();
    }

    /** @test */
    public function it_should_have_an_endpoint()
    {
        $this->assertSame($this->resource->endpoint(), 'periods');
    }

    /** @test */
    public function it_should_bill_a_period()
    {
        $stdClass = new stdClass;

        $this->resource->apiRequester->method('request')->willReturn($stdClass);

        $response = $this->resource->bill(1);

        $this->assertSame($response, $stdClass);
    }

    /** @test */
    public function it_should_return_usages_from_a_period()
    {
        $stdClass = new stdClass;

        $this->resource->apiRequester->method('request')->willReturn($stdClass);

        $response = $this->resource->usages(1);

        $this->assertSame($response, $stdClass);
    }
}
