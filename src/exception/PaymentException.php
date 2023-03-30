<?php
declare(strict_types=1);

namespace src\exception;

use RuntimeException;

/**
 *
 */
class PaymentException extends RuntimeException
{

    /**
     * @var PayResponseCode
     */
    private  $responseCode;

    /**
     * @param PayResponseCode $responseCode
     */
    public function __construct(PayResponseCode $responseCode)
    {
        parent::__construct($responseCode->getMessage());
        $this->responseCode = $responseCode;
    }

    /**
     * @return PayResponseCode
     */
    public function getResponseCode(): PayResponseCode
    {
        return $this->responseCode;
    }

    /**
     * @return string
     */
    public function getPaymentMessage(): string
    {
        return $this->responseCode->getMessage();
    }

    /**
     * @return int
     */
    public function getPaymentCode(): int
    {
        return $this->responseCode->value;
    }

}
