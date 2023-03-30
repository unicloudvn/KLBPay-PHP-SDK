<?php
declare(strict_types=1);

namespace src\transaction\model;

/**
 *
 */
class TransactionStatus: string
{
    public const CREATED = 'CREATED';
    public const SUCCESS = 'SUCCESS';
    public const CANCELED = 'CANCELED';
    public const FAILED = 'FAILED';
    public const TIMEOUT = 'TIMEOUT';

    /**
     * @param $value
     * @return TransactionStatus|null
     */
    public static function valueOf($value): ?TransactionStatus
    {
        foreach (TransactionStatus::cases() as $values) {
            if ($values->value == $value) {
                return $values;
            }
        }
        return null;
    }

}
