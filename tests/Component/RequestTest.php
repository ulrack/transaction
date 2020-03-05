<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Transaction\Tests\Component;

use PHPUnit\Framework\TestCase;
use Ulrack\Transaction\Component\Request;
use Ulrack\Transaction\Common\MethodEnum;
use Ulrack\Transaction\Exception\HeaderNotFoundException;

/**
 * @coversDefaultClass \Ulrack\Transaction\Component\Request
 * @covers \Ulrack\Transaction\Exception\HeaderNotFoundException
 */
class RequestTest extends TestCase
{
    /**
     * @return void
     *
     * @covers ::__construct
     * @covers ::getMethod
     * @covers ::getHeaders
     * @covers ::getHeader
     * @covers ::getTarget
     * @covers ::getPayload
     * @covers ::getParameters
     */
    public function testRequest(): void
    {
        $subject = new Request(
            MethodEnum::GET(),
            'foo',
            ['foo' => 'bar'],
            ['bar' => 'baz'],
            ['baz' => 'qux']
        );

        $this->assertInstanceOf(Request::class, $subject);
        $this->assertEquals(MethodEnum::GET(), $subject->getMethod());
        $this->assertEquals(['baz' => 'qux'], $subject->getHeaders());
        $this->assertEquals('qux', $subject->getHeader('baz'));
        $this->assertEquals('foo', $subject->getTarget());
        $this->assertEquals(['bar' => 'baz'], $subject->getPayload());
        $this->assertEquals(['foo' => 'bar'], $subject->getParameters());
        $this->expectException(HeaderNotFoundException::class);
        $subject->getHeader('foo');
    }
}
