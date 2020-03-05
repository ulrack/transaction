<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Transaction\Exception;

use Exception;

class HeaderNotFoundException extends Exception
{
    /**
     * Constructor
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        parent::__construct(
            sprintf(
                'Header with name "%s" could not be found.',
                $name
            )
        );
    }
}
