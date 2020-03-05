<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Transaction\Common;

interface CommandInterface
{
    /**
     * Returns the command.
     *
     * @return string
     */
    public function getCommand(): string;

    /**
     * Returns the parameters.
     *
     * @return array
     */
    public function getParameters(): array;

    /**
     * Returns the options.
     *
     * @return array
     */
    public function getOptions(): array;

    /**
     * Returns the flags.
     *
     * @return array
     */
    public function getFlags(): array;
}
