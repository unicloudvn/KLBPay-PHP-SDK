<?php

namespace src\verifyAccount\response;

use src\transaction\response\TransactionResponse;

class CheckAccountResponse implements TransactionResponse
{
    private $accountNo;
    private $accountName;

    /**
     * @param $accountNo
     * @param $accountName
     */
    public function __construct($accountNo, $accountName)
    {
        $this->accountNo = $accountNo;
        $this->accountName = $accountName;
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

    /**
     * @return String
     */
    public function getAccountName()
    {
        return $this->accountName;
    }

    /**
     * @param String $accountName
     */
    public function setAccountName($accountName): void
    {
        $this->accountName = $accountName;
    }


}