<?php

namespace src\exception;

use RuntimeException;

class PaymentException extends RuntimeException
{

    private $responseCode;

    /**
     * @param string $responseCode
     */
    public function __construct($responseCode)
    {
        parent::__construct();
        $this->responseCode = $responseCode;
    }

    /**
     * @return string
     */
    public function getResponseCode()
    {
        return $this->responseCode;
    }


    /**
     * @return string
     */
    public function getPaymentMessage()
    {
        return PayResponseCode::getMessage($this->responseCode);
    }

    /**
     * @return int
     */
    public function getPaymentCode()
    {
        return PayResponseCode::getCode($this->responseCode);
    }

    /**
     * String representation of the exception
     * @link https://php.net/manual/en/exception.tostring.php
     * @return string the string representation of the exception.
     */
    public function __toString()
    {
        return '- [' . $this->getPaymentCode() . '] - ' . $this->getPaymentMessage() . ' at ' . $this->getFile();
    }

}
