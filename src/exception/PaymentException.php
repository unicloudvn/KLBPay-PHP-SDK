<?php

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
    private PayResponseCode $responseCode;

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

    public function getPaymentMessage(): string
    {
        return $this->responseCode->getMessage();
    }

    public function getPaymentCode(): int
    {
        return $this->responseCode->value;
    }

}
