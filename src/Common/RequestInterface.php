<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Transaction\Common;

interface RequestInterface
{
    /**
     * The request method GET.
     * Retrieves information with a request.
     *
     * @var string
     */
    const METHOD_GET = 'get';

    /**
     * The request method POST.
     * Creates new resources with a request.
     *
     * @var string
     */
    const METHOD_POST = 'post';

    /**
     * The request method PUT.
     * Updates resource with a request.
     *
     * @var string
     */
    const METHOD_PUT = 'put';

    /**
     * The request method DELETE.
     * Deletes a resource with a request.
     *
     * @var string
     */
    const METHOD_DELETE = 'delete';

    /**
     * The request method PATCH.
     * Update a resource partially with a request.
     *
     * @var string
     */
    const METHOD_PATCH = 'patch';

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
