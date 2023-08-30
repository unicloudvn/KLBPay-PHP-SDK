<?php

namespace src\verify\response;

use src\transaction\response\TransactionResponse;

class LinkAccountResponse implements TransactionResponse
{
    public $accountNo;
    public $accountName;

    public $phone;

    public $expireTime;

    public $sessionId;

    /**
     * @param $accountNo
     * @param $accountName
     * @param $phone
     * @param $expireTime
     * @param $sessionId
     */
    public function __construct($accountNo, $accountName, $phone, $expireTime, $sessionId)
    {
        $this->accountNo = $accountNo;
        $this->accountName = $accountName;
        $this->phone = $phone;
        $this->expireTime = $expireTime;
        $this->sessionId = $sessionId;
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

    /**
     * @return String
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param String $phone
     */
    public function setPhone($phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return Integer
     */
    public function getExpireTime()
    {
        return $this->expireTime;
    }

    /**
     * @param Integer $expireTime
     */
    public function setExpireTime($expireTime): void
    {
        $this->expireTime = $expireTime;
    }

    /**
     * @return String
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * @param String $sessionId
     */
    public function setSessionId($sessionId): void
    {
        $this->sessionId = $sessionId;
    }

}