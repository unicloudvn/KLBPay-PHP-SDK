<?php

namespace src\verifyAccount\request;

use src\transaction\request\TransactionRequest;
use src\verifyAccount\response\CheckAccountResponse;

class CheckAccountNoRequest implements TransactionRequest
{


    public $accountNo;

    /**
     * @param $accountNo
     */
    public function __construct($accountNo)
    {
        $this->accountNo = $accountNo;
    }

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


}







