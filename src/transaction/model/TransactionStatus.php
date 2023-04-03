<?php

namespace src\transaction\model;

use InvalidArgumentException;
use ReflectionClass;

class TransactionStatus
{
    public const CREATED = ['code' => 1, 'status' => 'CREATED', 'name' => 'CREATED'];
    public const SUCCESS = ['code' => 2, 'status' => 'SUCCESS', 'name' => 'SUCCESS'];
    public const CANCELED = ['code' => 3, 'status' => 'CANCELED', 'name' => 'CANCELED'];
    public const FAILED = ['code' => 4, 'status' => 'FAILED', 'name' => 'FAILED'];
    public const TIMEOUT = ['code' => 5, 'status' => 'TIMEOUT', 'name' => 'TIMEOUT'];


    /**
     * @return array
     */
    public static function getConstants(): array
    {
        $oClass = new ReflectionClass(__CLASS__);
        return $oClass->getConstants();
    }

    public static function statusOf(string $status): string
    {
        $constants = self::getConstants();
        foreach ($constants as $name => $value) {
            if ($value['status'] == $status) {
                return $value['name'];
            }
        }
        throw new InvalidArgumentException('Invalid StatusCode');
    }

    public static function codeOf(int $code): string
    {
        $constants = self::getConstants();
        foreach ($constants as $name => $value) {
            if ($value['code'] == $code) {
                return $value['name'];
            }
        }
        throw new InvalidArgumentException('Invalid StatusCode');
    }

}
