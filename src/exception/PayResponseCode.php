<?php

namespace src\exception;

use InvalidArgumentException;
use ReflectionClass;

class PayResponseCode
{
    public const SUCCESS = ['code' => 0, 'message' => 'Success', 'name' => 'SUCCESS'];
    public const FAILED = ['code' => 1, 'message' => 'Failed', 'name' => 'FAILED'];
    public const INVALID_PARAM = ['code' => 2, 'message' => 'Invalid param', 'name' => 'INVALID_PARAM'];
    public const INVALID_TRANSACTION_ID = ['code' => 402, 'message' => 'Invalid transaction id', 'name' => 'INVALID_TRANSACTION_ID'];
    public const PAYMENT_SECURITY_VIOLATION = ['code' => 1601, 'message' => 'Security violation', 'name' => 'PAYMENT_SECURITY_VIOLATION'];
    public const PAYMENT_ORDER_COMPLETED = ['code' => 1602, 'message' => 'Order was completed', 'name' => 'PAYMENT_ORDER_COMPLETED'];
    public const PAYMENT_AMOUNT_INVALID = ['code' => 1603, 'message' => 'Invalid amount', 'name' => 'PAYMENT_AMOUNT_INVALID'];
    public const PAYMENT_TRANSACTION_CANCELED = ['code' => 1604, 'message' => 'Canceled transaction', 'name' => 'PAYMENT_TRANSACTION_CANCELED'];
    public const PAYMENT_TRANSACTION_EXPIRED = ['code' => 1605, 'message' => 'Transaction expired', 'name' => 'PAYMENT_TRANSACTION_EXPIRED'];
    public const PAYMENT_TRANSACTION_INVALID = ['code' => 1606, 'message' => 'Invalid transaction', 'name' => 'PAYMENT_TRANSACTION_INVALID'];
    public const PAYMENT_TRANSACTION_FAILED = ['code' => 1607, 'message' => 'Transaction failed', 'name' => 'PAYMENT_TRANSACTION_FAILED'];
    public const PAYMENT_SERVICE_UNAVAILABLE = ['code' => 1608, 'message' => 'Service unavailable', 'name' => 'PAYMENT_SERVICE_UNAVAILABLE'];
    public const PAYMENT_INVALID_CLIENT_ID = ['code' => 1609, 'message' => 'Invalid client id', 'name' => 'PAYMENT_INVALID_CLIENT_ID'];

    /**
     * @param $name
     * @return int
     */
    public static function getCode($name): int
    {
        if (defined("self::$name")) {
            return constant("self::$name")['code'];
        }
        throw new InvalidArgumentException('Invalid PayCode');
    }

    /**
     * @param $name
     * @return string
     */
    public static function getMessage($name): string
    {
        if (defined("self::$name")) {
            return constant("self::$name")['message'];
        }
        throw new InvalidArgumentException('Invalid PayCode');
    }

    /**
     * @param $code
     * @return string
     */
    public static function valueOf($code): string
    {
        $constants = self::getConstants();
        foreach ($constants as $name => $value) {
            if ($value['code'] == $code) {
                return $value['name'];
            }
        }
        throw new InvalidArgumentException('Invalid PayCode');
    }

    /**
     * @return array
     */
    public static function getConstants(): array
    {
        $oClass = new ReflectionClass(__CLASS__);
        return $oClass->getConstants();
    }
}
