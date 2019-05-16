<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Transaction\Transaction;

use Ulrack\Transaction\Common\RequestInterface;
use Ulrack\Transaction\Common\MethodEnum;
use Ulrack\Transaction\Exception\HeaderNotFoundException;

class Request implements RequestInterface
{
    /** @var string */
    private $method;

    /** @var array|null */
    private $headers;

    /** @var string */
    private $target;

    /** @var mixed */
    private $payload;

    /** @var array|null */
    private $parameters;

    /**
     * Constructor
     *
     * @param MethodEnum $method
     * @param string     $target
     * @param array|null $parameters
     * @param mixed      $payload
     * @param array|null $headers
     */
    public function __construct(
        MethodEnum $method,
        string $target,
        array $parameters = null,
        $payload = null,
        array $headers = null
    ) {
        $this->method = (string) $method;
        $this->target = $target;
        $this->payload = $payload;
        $this->headers = $headers;
        $this->parameters = $parameters;
    }

    /**
     * Retrieves the method of the request.
     *
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * Retrieves the request headers.
     *
     * @return string[]
     */
    public function getHeaders(): ?array
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

    /**
     * Retrieves the target of the request.
     *
     * @return string
     */
    public function getTarget(): string
    {
        return $this->target;
    }

    /**
     * Retrieves the payload of the request.
     *
     * @return mixed
     */
    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * Retrieves a associative array of parameters of the request.
     *
     * @return array|null
     */
    public function getParameters(): ?array
    {
        return $this->parameters;
    }
}
