<?php

namespace src\exception;

use RuntimeException;

class PaymentException extends RuntimeException
{

    private $responseCode;

    /**
     * @param string $responseCode
     */
    public function __construct(string $responseCode)
    {
        parent::__construct();
        $this->responseCode = $responseCode;
    }

    public function getResponseCode(): string
    {
        return $this->responseCode;
    }


    public function getPaymentMessage(): string
    {
        return PayResponseCode::getMessage($this->responseCode);
    }

    public function getPaymentCode(): int
    {
        return PayResponseCode::getCode($this->responseCode);
    }

    public function __toString()
    {
        return '- [' . $this->getPaymentCode() . '] - ' . $this->getPaymentMessage() . ' at ' . $this->getFile();
    }

}
