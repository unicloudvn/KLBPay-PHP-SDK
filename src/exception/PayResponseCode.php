<?php

namespace src\exception;

use JsonSerializable;

enum PayResponseCode: int implements JsonSerializable
{
    case SUCCESS = 0;
    case FAILED = 1;
    case INVALID_PARAM = 2;
    // Payment
    case PAYMENT_SECURITY_VIOLATION = 1601;
    case PAYMENT_ORDER_COMPLETED = 1602;
    case PAYMENT_AMOUNT_INVALID = 1603;
    case PAYMENT_TRANSACTION_CANCELED = 1604;
    case PAYMENT_TRANSACTION_EXPIRED = 1605;
    case PAYMENT_TRANSACTION_INVALID = 1606;
    case PAYMENT_TRANSACTION_FAILED = 1607;
    case PAYMENT_SERVICE_UNAVAILABLE = 1608;
    case PAYMENT_INVALID_CLIENT_ID = 1609;

    public function getMessage(): string
    {
        return match ($this) {
            self::SUCCESS => "Success",
            self::FAILED => "Failed",
            self::INVALID_PARAM => "Invalid param",
            self::PAYMENT_SECURITY_VIOLATION => "Security violation",
            self::PAYMENT_ORDER_COMPLETED => "Order was completed",
            self::PAYMENT_AMOUNT_INVALID => "Invalid amount",
            self::PAYMENT_TRANSACTION_CANCELED => "Canceled transaction",
            self::PAYMENT_TRANSACTION_EXPIRED => "Transaction expired",
            self::PAYMENT_TRANSACTION_INVALID => "Invalid transaction",
            self::PAYMENT_TRANSACTION_FAILED => "Transaction failed",
            self::PAYMENT_SERVICE_UNAVAILABLE => "Service unavailable",
            self::PAYMENT_INVALID_CLIENT_ID => "Invalid client id",
        };
    }

    public static function valueOf($value): ?PayResponseCode
    {
        foreach (PayResponseCode::cases() as $code) {
            if ($code->value == $value) {
                return $code;
            }
        }
        return null;
    }

    public function jsonSerialize(): array
    {
        return [
            'code' => $this->value,
            'message' => $this->getMessage()
        ];
    }
}
