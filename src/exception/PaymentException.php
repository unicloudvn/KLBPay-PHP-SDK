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
    private PayResponseCode $response_code;

    /**
     * @param PayResponseCode $responseCode
     */
    public function __construct(PayResponseCode $responseCode)
    {
        parent::__construct($responseCode->getMessage());
        $this->response_code = $responseCode;
    }

    /**
     * @return PayResponseCode
     */
    public function getResponseCode(): PayResponseCode
    {
        return $this->response_code;
    }

    public function getPaymentMessage(): string
    {
        return $this->response_code->getMessage();
    }

    public function getPaymentCode(): int
    {
        return $this->response_code->value;
    }

}
