<?php
declare(strict_types=1);

namespace src\exception;

use JsonSerializable;

/**
 *
 */
class PayResponseCode: int implements JsonSerializable
{
    public const SUCCESS = 0;
    public const FAILED = 1;
    public const INVALID_PARAM = 2;
    // Payment
    public const PAYMENT_SECURITY_VIOLATION = 1601;
    public const PAYMENT_ORDER_COMPLETED = 1602;
    public const PAYMENT_AMOUNT_INVALID = 1603;
    public const PAYMENT_TRANSACTION_CANCELED = 1604;
    public const PAYMENT_TRANSACTION_EXPIRED = 1605;
    public const PAYMENT_TRANSACTION_INVALID = 1606;
    public const PAYMENT_TRANSACTION_FAILED = 1607;
    public const PAYMENT_SERVICE_UNAVAILABLE = 1608;
    public const PAYMENT_INVALID_CLIENT_ID = 1609;
    public $value;

    /**
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return match ($this) {
            self::SUCCESS => 'Success',
            self::FAILED => 'Failed',
            self::INVALID_PARAM => 'Invalid param',
            self::PAYMENT_SECURITY_VIOLATION => 'Security violation',
            self::PAYMENT_ORDER_COMPLETED => 'Order was completed',
            self::PAYMENT_AMOUNT_INVALID => 'Invalid amount',
            self::PAYMENT_TRANSACTION_CANCELED => 'Canceled transaction',
            self::PAYMENT_TRANSACTION_EXPIRED => 'Transaction expired',
            self::PAYMENT_TRANSACTION_INVALID => 'Invalid transaction',
            self::PAYMENT_TRANSACTION_FAILED => 'Transaction failed',
            self::PAYMENT_SERVICE_UNAVAILABLE => 'Service unavailable',
            self::PAYMENT_INVALID_CLIENT_ID => 'Invalid client id',
        };
    }

    /**
     * @param $value
     * @return PayResponseCode|null
     */
    public static function valueOf($value): ?PayResponseCode
    {
        foreach (PayResponseCode::cases() as $code) {
            if ($code->value == $value) {
                return $code;
            }
        }
        return null;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4
     */
    public function jsonSerialize(): array
    {
        return [
            'code' => $this->value,
            'message' => $this->getMessage()
        ];
    }
}
