<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Transaction\Common;

interface RequestInterface
{
    /**
     * Retrieves the method of the request.
     *
     * @return string
     */
    public function getMethod(): string;

    /**
     * Retrieves the request headers.
     *
     * @return string[]|null
     */
    public function getHeaders(): ?array;

    /**
     * Retrieves a header by its' name.
     *
     * @param  string $name
     *
     * @return string
     */
    public function getHeader(string $name): string;

    /**
     * Retrieves the target of the request.
     *
     * @return string
     */
    public function getTarget(): string;

    /**
     * Retrieves the payload of the request.
     *
     * @return mixed
     */
    public function getPayload();

    /**
     * Retrieves a associative array of parameters of the request.
     *
     * @return array|null
     */
    public function getParameters(): ?array;
}
