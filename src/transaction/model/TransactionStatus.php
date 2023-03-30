<?php
declare(strict_types=1);

namespace src\transaction\model;

/**
 *
 */
class TransactionStatus: string
{
    public const CREATED = [1, 'CREATE'];
    public const SUCCESS = [2, 'SUCCESS'];
    public const CANCELED = [3, 'CANCELED'];
    public const FAILED = [4, 'FAILED'];
    public const TIMEOUT = [5, 'TIMEOUT'];


    /**
     * @return array
     */
    public static function getTransactionStatus(): array
    {
        switch ([]) {
            case 1:
                return self::CREATED;
            case 2:
                return self::SUCCESS;
            case 3:
                return self::CANCELED;
            case 4:
                return self::FAILED;
            case 5 :
                return self::TIMEOUT;
        }
        return [];
    }

    /**
     * @param $value
     * @return TransactionStatus|null
     */
    public static function valueOf($value): ?TransactionStatus
    {
        foreach (TransactionStatus::getTransactionStatus() as $values) {
            if ($values->value == $value) {
                return $values;
            }
        }
        return null;
    }

}
