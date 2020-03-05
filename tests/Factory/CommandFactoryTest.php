<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Transaction\Tests\Factory;

use PHPUnit\Framework\TestCase;
use Ulrack\Transaction\Factory\CommandFactory;
use Ulrack\Transaction\Common\CommandInterface;

/**
 * @coversDefaultClass \Ulrack\Transaction\Factory\CommandFactory
 */
class CommandFactoryTest extends TestCase
{
    /**
     * @return void
     *
     * @covers ::create
     * @covers ::prepareArguments
     */
    public function testCreate(): void
    {
        $command = [
            'foo.php',
            'bar:qux',
            'bar',
            '--parameter=test',
            '--param',
            'foo',
            '-f',
        ];

        $target = CommandFactory::create($command);

        $this->assertInstanceOf(CommandInterface::class, $target);

        $this->assertEquals(
            'bar:qux',
            $target->getCommand()
        );

        $this->assertEquals(
            ['f'],
            $target->getFlags()
        );

        $this->assertEquals(
            ['parameter' => 'test', 'param' => 'foo'],
            $target->getParameters()
        );

        $this->assertEquals(
            ['bar'],
            $target->getOptions()
        );
    }
}
