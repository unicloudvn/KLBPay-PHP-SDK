<?php

namespace src\verifyAccountNo\request;

use src\base\IRequest;

class LinkAccountRequest implements IRequest
{
    public $accountNo;

    /**
     * @param string $accountNo
     */
    public function __construct(string $accountNo)
    {
        $this->accountNo = $accountNo;
    }

    /**
     * @return string
     */
    public function getAccountNo()
    {
        return $this->accountNo;
    }

    /**
     * @param string $accountNo
     */
    public function setAccountNo($accountNo): void
    {
        $this->accountNo = $accountNo;
    }
}