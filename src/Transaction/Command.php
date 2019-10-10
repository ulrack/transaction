<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Transaction\Transaction;

use Ulrack\Transaction\Common\CommandInterface;

class Command implements CommandInterface
{
    /** @var string */
    private $command;

    /** @var array */
    private $parameters;

    /** @var array */
    private $options;

    /** @var array */
    private $flags;

    /**
     * Constructor
     *
     * @param string $command
     * @param array  $parameters
     * @param array  $options
     * @param array  $flags
     */
    public function __construct(
        string $command,
        array $parameters = [],
        array $options = [],
        array $flags = []
    ) {
        $this->command = $command;
        $this->parameters = $parameters;
        $this->options = $options;
        $this->flags = $flags;
    }

    /**
     * Returns the command.
     *
     * @return string
     */
    public function getCommand(): string
    {
        return $this->command;
    }

    /**
     * Returns the parameters.
     *
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * Returns the options.
     *
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * Returns the flags.
     *
     * @return array
     */
    public function getFlags(): array
    {
        return $this->flags;
    }
}
