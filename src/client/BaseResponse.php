<?php

namespace src\client;

use src\base\IResponse;
use src\exception\PayResponseCode;

class BaseResponse
{
    public $code;
    public $message;
    public $data;

    /**
     * @param IResponse $data
     */
    public function __construct(IResponse $data)
    {
        $this->data = $data;
        $this->message = PayResponseCode::SUCCESS['message'];
        $this->code = PayResponseCode::SUCCESS['code'];
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
    public function setCode(int $code)
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
    public function setMessage(string $message)
    {
        $this->message = $message;
    }

    /**
     * @return IResponse
     */
    public function getData(): IResponse
    {
        return $this->data;
    }

    /**
     * @param mixed|null $data
     */
    public function setData(IResponse $data)
    {
        $this->data = $data;
    }

}
