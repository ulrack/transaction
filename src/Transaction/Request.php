<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Transaction\Transaction;

use Ulrack\Transaction\Common\RequestInterface;
use Ulrack\Transaction\Exception\HeaderNotFoundException;
use Ulrack\Search\Common\SearchCriteriaInterface;

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

    /** @var SearchCriteriaInterface|null */
    private $searchCriteria;

    /**
     * Constructor
     *
     * @param string                       $method
     * @param string                       $target
     * @param mixed                        $payload
     * @param array|null                   $headers
     * @param SearchCriteriaInterface|null $searchCriteria
     */
    public function __construct(
        string $method,
        string $target,
        $payload,
        array $headers = null,
        SearchCriteriaInterface $searchCriteria = null
    ) {
        $this->method = $method;
        $this->headers = $headers;
        $this->target = $target;
        $this->payload = $payload;
        $this->searchCriteria = $searchCriteria;
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
     * Retrieves the search criteria for the request.
     *
     * @return SearchCriteriaInterface|null
     */
    public function getSearchCriteria(): ?SearchCriteriaInterface
    {
        return $this->searchCriteria;
    }
}
