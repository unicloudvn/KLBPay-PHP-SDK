<?php

namespace src\transaction\model;

enum TransactionStatus: string
{
    case CREATED = "CREATED";
    case SUCCESS = "SUCCESS";
    case CANCELED = "CANCELED";
    case FAIL = "FAIL";
    case TIMEOUT = "TIMEOUT";

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
