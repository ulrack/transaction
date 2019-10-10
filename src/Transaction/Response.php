<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Transaction\Transaction;

use Ulrack\Transaction\Common\ResponseInterface;
use Ulrack\Transaction\Exception\HeaderNotFoundException;

class Response implements ResponseInterface
{
    /** @var bool */
    private $success;

    /** @var mixed */
    private $body;

    /** @var int */
    private $statusCode;

    /** @var array */
    private $headers;

    /**
     * Constructor
     *
     * @param bool  $success
     * @param mixed $body
     * @param int   $statusCode
     * @param array $headers
     */
    public function __construct(
        bool $success,
        $body,
        int $statusCode,
        array $headers = []
    ) {
        $this->success = $success;
        $this->body = $body;
        $this->statusCode = $statusCode;
        $this->headers = $headers;
    }

    /**
     * Determines if the request was a success.
     *
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->success;
    }

    /**
     * Retrieves the body of the response.
     *
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Retrieves the status code of the response.
     *
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * Retrieves the response headers.
     *
     * @return string[]
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * Retrieves a header by its' name.
     *
     * @param  string $name
     *
     * @return string
     *
     * @throws HeaderNotFoundException If the header is not set.
     */
    public function getHeader(string $name): string
    {
        if (isset($this->headers[$name])) {
            return $this->headers[$name];
        }

        throw new HeaderNotFoundException($name);
    }
}
