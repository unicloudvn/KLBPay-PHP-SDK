<?php

namespace src\verify\request;

use src\transaction\request\TransactionRequest;

class LinkAccountRequest implements TransactionRequest
{
    /**
     * @return String
     */
    public function getAccountNo()
    {
        return $this->accountNo;
    }

    /**
     * @param String $accountNo
     */
    public function setAccountNo($accountNo): void
    {
        $this->accountNo = $accountNo;
    }

    public $accountNo;

    /**
     * @param $accountNo
     */
    public function __construct($accountNo)
    {
        $this->accountNo = $accountNo;
    }


}