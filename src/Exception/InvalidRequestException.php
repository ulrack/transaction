<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Transaction\Exception;

use Exception;

class InvalidRequestException extends Exception
{
    /**
     * Constructor
     *
     * @param string $message
     */
    public function __construct(string $message)
    {
        parent::__construct(
            sprintf(
                'Invalid request: %s.',
                $message
            )
        );
    }
}
