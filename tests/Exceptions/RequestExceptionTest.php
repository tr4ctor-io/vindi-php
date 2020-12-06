<?php

namespace Vindi\Test\Exceptions;

use GuzzleHttp\Psr7\Response;
use Vindi\Exceptions\RequestException;
use PHPUnit\Framework\TestCase;

class RequestExceptionTest extends TestCase
{
    /** @test */
    public function it_should_access_exception_getters()
    {
        $status = 400;
        $errors = [
            (object) [
                'id'        => 'id 1',
                'parameter' => 'parameter 1',
                'message'   => 'message 1',
            ],
            (object) [
                'id'        => 'id 2',
                'parameter' => 'parameter 2',
                'message'   => 'message 2',
            ],
        ];
        $exception = new RequestException($status, $errors, ['json' => ['parameter' => 'content']]);

        $this->assertSame($status, $exception->getCode());
        $this->assertSame($errors, $exception->getErrors());
        $this->assertSame(['id 1', 'id 2'], $exception->getIds());
        $this->assertSame(['parameter 1', 'parameter 2'], $exception->getParameters());
        $this->assertSame(['message 1', 'message 2'], $exception->getMessages());
        $this->assertEquals('{"parameter":"content"}', $exception->getRequestBody());
    }
}
