<?php

namespace src\security;

class BaseHeader
{
    const TIMESTAMP = 'x-api-time';
    const SIGNATURE = 'x-api-validate';
    const CLIENT = 'x-api-client';
    const CONTENT_TYPE = 'Content-Type';

}
