<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Transaction\Tests\Component;

use PHPUnit\Framework\TestCase;
use Ulrack\Transaction\Component\Response;
use Ulrack\Search\Common\SearchCriteriaInterface;
use Ulrack\Transaction\Exception\HeaderNotFoundException;

/**
 * @coversDefaultClass \Ulrack\Transaction\Component\Response
 * @covers \Ulrack\Transaction\Exception\HeaderNotFoundException
 */
class ResponseTest extends TestCase
{
    /**
     * @return void
     *
     * @covers ::__construct
     * @covers ::isSuccess
     * @covers ::getBody
     * @covers ::getStatusCode
     * @covers ::getHeaders
     * @covers ::getHeader
     */
    public function testResponse(): void
    {
        $subject = new Response(true, 'foo', 1, ['bar' => 'baz']);
        $this->assertInstanceOf(Response::class, $subject);

        $this->assertEquals('foo', $subject->getBody());
        $this->assertEquals('baz', $subject->getHeader('bar'));
        $this->assertEquals(['bar' => 'baz'], $subject->getHeaders());
        $this->assertEquals(1, $subject->getStatusCode());
        $this->assertEquals(true, $subject->isSuccess());
        $this->expectException(HeaderNotFoundException::class);
        $subject->getHeader('foo');
    }
}
