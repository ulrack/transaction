<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Transaction\Tests\Component;

use PHPUnit\Framework\TestCase;
use Ulrack\Transaction\Component\Command;

/**
 * @coversDefaultClass \Ulrack\Transaction\Component\Command
 */
class CommandTest extends TestCase
{
    /**
     * @return void
     *
     * @covers ::__construct
     * @covers ::getCommand
     * @covers ::getParameters
     * @covers ::getOptions
     * @covers ::getFlags
     */
    public function testCommand(): void
    {
        $command = 'foo:bar';
        $parameters = ['baz' => 'qux'];
        $options = ['foo'];
        $flags = ['b'];

        $subject = new Command(
            $command,
            $parameters,
            $options,
            $flags
        );

        $this->assertEquals($command, $subject->getCommand());
        $this->assertEquals($parameters, $subject->getParameters());
        $this->assertEquals($options, $subject->getOptions());
        $this->assertEquals($flags, $subject->getFlags());
    }
}
