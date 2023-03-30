<?php
declare(strict_types=1);

namespace src\exception;


/**
 *
 */
class PayResponseCode
{
    public const SUCCESS = [0, 'Success'];
    public const FAILED = [1, 'Failed'];
    public const INVALID_PARAM = [2, 'Invalid param'];

    public const PAYMENT_SECURITY_VIOLATION = [1601, 'Security violation'];
    public const PAYMENT_ORDER_COMPLETED = [1602, 'Order was completed'];
    public const PAYMENT_AMOUNT_INVALID = [1603, 'Invalid amount'];
    public const PAYMENT_TRANSACTION_CANCELED = [1604, 'Canceled transaction'];
    public const PAYMENT_TRANSACTION_EXPIRED = [1605, 'Transaction expired'];
    public const PAYMENT_TRANSACTION_INVALID = [1606, 'Invalid transaction'];
    public const PAYMENT_TRANSACTION_FAILED = [1607, 'Transaction failed'];
    public const PAYMENT_SERVICE_UNAVAILABLE = [1608, 'Service unavailable'];
    public const PAYMENT_INVALID_CLIENT_ID = [1609, 'Invalid client id'];


    /**
     * @return array
     */
    public static function getMessage(): array
    {
        switch ([]) {
            case 0:
                return self::SUCCESS;
            case 1:
                return self::FAILED;
            case 2:
                return self::INVALID_PARAM;
            case 1601:
                return self::PAYMENT_SECURITY_VIOLATION;
            case 1602:
                return self::PAYMENT_ORDER_COMPLETED;
            case 1603:
                return self::PAYMENT_AMOUNT_INVALID;
            case 1604:
                return self::PAYMENT_TRANSACTION_CANCELED;
            case 1605:
                return self::PAYMENT_TRANSACTION_EXPIRED;
            case 1606:
                return self::PAYMENT_TRANSACTION_INVALID;
            case 1607:
                return self::PAYMENT_TRANSACTION_FAILED;
            case 1608:
                return self::PAYMENT_SERVICE_UNAVAILABLE;
            case 1609:
                return self::PAYMENT_INVALID_CLIENT_ID;
        }
        return [];
    }


    /**
     * @param $responseCode
     * @return PayResponseCode|null
     */
    public static function valueOf($responseCode): ?PayResponseCode
    {
        foreach (PayResponseCode::getMessage() as $code) {
            if ($code->value == $responseCode) {
                return $code;
            }
        }
        return null;
    }

}
