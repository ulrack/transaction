<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Transaction\Tests\Factory;

use PHPUnit\Framework\TestCase;
use Ulrack\Transaction\Common\MethodEnum;
use Ulrack\Transaction\Factory\RequestFactory;
use Ulrack\Transaction\Common\RequestInterface;
use Ulrack\Transaction\Exception\InvalidRequestException;

/**
 * @coversDefaultClass \Ulrack\Transaction\Factory\RequestFactory
 * @covers \Ulrack\Transaction\Exception\InvalidRequestException
 */
class RequestFactoryTest extends TestCase
{
    /**
     * @return void
     *
     * @covers ::create
     * @covers ::parseHeaders
     * @covers ::normalizeKey
     */
    public function testCommand(): void
    {
        $server = [
            'REQUEST_METHOD' => 'POST',
            'REQUEST_URI' => 'foo/bar?foo=bar',
            'HTTP_CONTENT_TYPE' => 'application/json'
        ];

        $get = ['foo' => 'bar'];
        $post = ['baz' => 'qux'];

        $target = RequestFactory::create($server, $get, $post);

        $this->assertInstanceOf(RequestInterface::class, $target);

        $this->assertEquals(MethodEnum::POST(), $target->getMethod());
        $this->assertEquals($post, $target->getPayload());
        $this->assertEquals($get, $target->getParameters());
        $this->assertEquals(
            [
                'Request-Method' => 'POST',
                'Request-Uri' => 'foo/bar?foo=bar',
                'Content-Type' => 'application/json'
            ],
            $target->getHeaders()
        );

        $this->assertEquals(
            'foo/bar',
            $target->getTarget()
        );

        $this->expectException(InvalidRequestException::class);

        $server['REQUEST_METHOD'] = 'foo';

        RequestFactory::create($server, $get, $post);
    }
}
