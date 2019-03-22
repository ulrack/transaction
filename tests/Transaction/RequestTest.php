<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Transaction\Tests\Transaction;

use PHPUnit\Framework\TestCase;
use Ulrack\Transaction\Transaction\Request;
use Ulrack\Transaction\Common\RequestInterface;
use Ulrack\Transaction\Exception\HeaderNotFoundException;

/**
 * @coversDefaultClass \Ulrack\Transaction\Transaction\Request
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
            'foo',
            ['bar' => 'baz'],
            RequestInterface::METHOD_GET,
            ['baz' => 'qux'],
            ['foo' => 'bar']
        );

        $this->assertInstanceOf(Request::class, $subject);
        $this->assertEquals(RequestInterface::METHOD_GET, $subject->getMethod());
        $this->assertEquals(['baz' => 'qux'], $subject->getHeaders());
        $this->assertEquals('qux', $subject->getHeader('baz'));
        $this->assertEquals('foo', $subject->getTarget());
        $this->assertEquals(['bar' => 'baz'], $subject->getPayload());
        $this->assertEquals(['foo' => 'bar'], $subject->getParameters());
        $this->expectException(HeaderNotFoundException::class);
        $subject->getHeader('foo');
    }
}
