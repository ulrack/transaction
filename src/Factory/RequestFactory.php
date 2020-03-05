<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Ulrack\Transaction\Factory;

use Ulrack\Transaction\Common\MethodEnum;
use Ulrack\Transaction\Component\Request;
use Ulrack\Transaction\Common\RequestInterface;
use Ulrack\Transaction\Exception\InvalidRequestException;

class RequestFactory
{
    /**
     * Creates a Web request.
     *
     * @param array $server The server parameters.
     * @param array $get The get parameters.
     * @param array $post The post payload.
     *
     * @return RequestInterface
     *
     * @throws InvalidRequestException When a invalid request method is detected.
     */
    public static function create(
        array $server,
        array $get = [],
        array $post = []
    ): RequestInterface {
        $methods = MethodEnum::getOptions();
        if (!isset($methods[$server['REQUEST_METHOD']])) {
            throw new InvalidRequestException('Invalid request method.');
        }

        return new Request(
            new MethodEnum($methods[$server['REQUEST_METHOD']]),
            strtok($server['REQUEST_URI'], '?'),
            $get,
            $post,
            static::parseHeaders($server)
        );
    }

    /**
     * Parse the headers to normalized key value pairs.
     *
     * @param array $server
     *
     * @return array
     */
    private static function parseHeaders(array $server): array
    {
        $headers = [];
        foreach ($server as $key => $header) {
            if (substr($key, 0, 5) === 'HTTP_') {
                $headers[static::normalizeKey(substr($key, 5))] = $header;

                continue;
            }

            $headers[static::normalizeKey($key)] = $header;
        }

        return $headers;
    }

    /**
     * Normalize key name to standard format.
     *
     * @param string $key
     *
     * @return string
     */
    private static function normalizeKey(string $key): string
    {
        return str_replace(
            ' ',
            '-',
            ucwords(
                strtolower(
                    str_replace(
                        '_',
                        ' ',
                        $key
                    )
                )
            )
        );
    }
}
