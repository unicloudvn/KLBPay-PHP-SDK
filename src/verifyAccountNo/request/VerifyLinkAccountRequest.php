<?php

namespace src\verifyAccountNo\request;


use src\base\IRequest;

class VerifyLinkAccountRequest implements IRequest
{
    public $sessionId;
    public $accountNo;
    public $otp;

    /**
     * @param string $sessionId
     * @param string $accountNo
     * @param string $otp
     */
    public function __construct(string $sessionId, string $accountNo, string $otp)
    {
        $this->sessionId = $sessionId;
        $this->accountNo = $accountNo;
        $this->otp = $otp;
    }

    /**
     * @param string $sessionId
     */
    public function setSessionId(string $sessionId): void
    {
        $this->sessionId = $sessionId;
    }

    /**
     * @param string $accountNo
     */
    public function setAccountNo(string $accountNo): void
    {
        $this->accountNo = $accountNo;
    }

    /**
     * @param string $otp
     */
    public function setOtp(string $otp): void
    {
        $this->otp = $otp;
    }

    /**
     * @return string
     */
    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    /**
     * @return string
     */
    public function getAccountNo(): string
    {
        return $this->accountNo;
    }

    /**
     * @return string
     */
    public function getOtp(): string
    {
        return $this->otp;
    }


}