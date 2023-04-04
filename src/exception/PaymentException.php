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

    /**
     * @return string
     */
    public function getResponseCode(): string
    {
        return $this->responseCode;
    }


    /**
     * @return string
     */
    public function getPaymentMessage(): string
    {
        return PayResponseCode::getMessage($this->responseCode);
    }

    /**
     * @return int
     */
    public function getPaymentCode(): int
    {
        return PayResponseCode::getCode($this->responseCode);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return '- [' . $this->getPaymentCode() . '] - ' . $this->getPaymentMessage() . ' at ' . $this->getFile();
    }

}
