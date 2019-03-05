<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Transaction\Tests\Transaction;

use PHPUnit\Framework\TestCase;
use Ulrack\Transaction\Transaction\Request;
use Ulrack\Transaction\Common\RequestInterface;
use Ulrack\Search\Common\SearchCriteriaInterface;
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
     * @covers ::getSearchCriteria
     */
    public function testRequest(): void
    {
        $searchCriteria = $this->createMock(SearchCriteriaInterface::class);
        $subject = new Request(
            RequestInterface::METHOD_GET,
            'foo',
            ['bar' => 'baz'],
            ['baz' => 'qux'],
            $searchCriteria
        );

        $this->assertInstanceOf(Request::class, $subject);
        $this->assertEquals(RequestInterface::METHOD_GET, $subject->getMethod());
        $this->assertEquals(['baz' => 'qux'], $subject->getHeaders());
        $this->assertEquals('qux', $subject->getHeader('baz'));
        $this->assertEquals('foo', $subject->getTarget());
        $this->assertEquals(['bar' => 'baz'], $subject->getPayload());
        $this->assertEquals($searchCriteria, $subject->getSearchCriteria());
        $this->expectException(HeaderNotFoundException::class);
        $subject->getHeader('foo');
    }
}
