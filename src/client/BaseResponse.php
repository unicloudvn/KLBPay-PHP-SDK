<?php

namespace src\client;

use src\exception\PayResponseCode;
use src\transaction\response\TransactionResponse;

/**
 *
 */
class BaseResponse
{
    public int $code;
    public string $message;
    public TransactionResponse $data;

    /**
     * @param TransactionResponse $data
     */
    public function __construct(TransactionResponse $data)
    {
        $this->data = $data;
        $this->message = PayResponseCode::SUCCESS->getMessage();
        $this->code = PayResponseCode::SUCCESS->value;
    }

    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @param int $code
     */
    public function setCode(int $code): void
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return TransactionResponse
     */
    public function getData(): TransactionResponse
    {
        return $this->data;
    }

    /**
     * @param mixed|null $data
     */
    public function setData(TransactionResponse $data): void
    {
        $this->data = $data;
    }

}
