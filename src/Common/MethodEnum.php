<?php
/**
 * Copyright (C) GrizzIT, Inc. All rights reserved.
 * See LICENSE for license details.
 */
namespace Ulrack\Transaction\Common;

use Ulrack\Enum\Enum;

/**
 * @method static MethodEnum GET()
 * @method static MethodEnum POST()
 * @method static MethodEnum PUT()
 * @method static MethodEnum DELETE()
 * @method static MethodEnum PATCH()
 */
class MethodEnum extends Enum
{
    /**
     * The request method GET.
     * Retrieves information with a request.
     *
     * @var string
     */
    const GET = 'get';

    /**
     * The request method POST.
     * Creates new resources with a request.
     *
     * @var string
     */
    const POST = 'post';

    /**
     * The request method PUT.
     * Updates resource with a request.
     *
     * @var string
     */
    const PUT = 'put';

    /**
     * The request method DELETE.
     * Deletes a resource with a request.
     *
     * @var string
     */
    const DELETE = 'delete';

    /**
     * The request method PATCH.
     * Update a resource partially with a request.
     *
     * @var string
     */
    const PATCH = 'patch';
}
