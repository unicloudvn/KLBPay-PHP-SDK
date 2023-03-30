<?php

namespace src\security;

use Exception;

/**
 *
 */
class BaseHeader
{
    public const TIMESTAMP = 'x-api-time';
    public const SIGNATURE = 'x-api-validate';
    public const CLIENT = 'x-api-client';
    public const CONTENT_TYPE = 'Content-Type';

    /**
     * @throws Exception
     */
    private function __construct()
    {
        throw new Exception();
    }

}
