<?php

namespace src\verifyAccount\request;

use src\transaction\request\TransactionRequest;

class VerifyLinkAccountRequest implements TransactionRequest
{
    public $sessionId;
    public $accountNo;
    public $otp;

    /**
     * @param String $sessionId
     */
    public function setSessionId($sessionId): void
    {
        $this->sessionId = $sessionId;
    }

    /**
     * @param String $accountNo
     */
    public function setAccountNo($accountNo): void
    {
        $this->accountNo = $accountNo;
    }

    /**
     * @param String $otp
     */
    public function setOtp($otp): void
    {
        $this->otp = $otp;
    }

    /**
     * @return String
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * @return String
     */
    public function getAccountNo()
    {
        return $this->accountNo;
    }

    /**
     * @return String
     */
    public function getOtp()
    {
        return $this->otp;
    }

    /**
     * @param $sessionId
     * @param $accountNo
     * @param $otp
     */
    public function __construct($sessionId, $accountNo, $otp)
    {
        $this->sessionId = $sessionId;
        $this->accountNo = $accountNo;
        $this->otp = $otp;
    }
}