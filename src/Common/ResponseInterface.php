<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Transaction\Common;

interface ResponseInterface
{
    /**
     * Determines if the request was a success.
     *
     * @return bool
     */
    public function isSuccess(): bool;

    /**
     * Retrieves the body of the response.
     *
     * @return mixed
     */
    public function getBody();

    /**
     * Retrieves the status code of the response.
     *
     * @return int
     */
    public function getStatusCode(): int;

    /**
     * Retrieves the response headers.
     *
     * @return string[]
     */
    public function getHeaders(): array;

    /**
     * Retrieves a header by its' name.
     *
     * @param  string $name
     *
     * @return string
     */
    public function getHeader(string $name): string;
}
