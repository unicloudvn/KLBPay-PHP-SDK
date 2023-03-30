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
        parent::__construct(PayResponseCode::getMessage());
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
     * @return array
     */
    public function getPaymentMessage(): array
    {
        return PayResponseCode::getMessage();
    }

    /**
     * @return PayResponseCode
     */
    public function getPaymentCode(): PayResponseCode
    {
        return $this->responseCode;
    }

}
