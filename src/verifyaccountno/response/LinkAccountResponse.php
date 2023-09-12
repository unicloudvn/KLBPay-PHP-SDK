<?php

namespace src\verifyaccountno\request;

use src\base\IResponse;

class LinkAccountResponse implements IResponse
{
    public  $accountNo;
    public  $accountName;

    public  $phone;

    public  $expireTime;

    public  $sessionId;

    /**
     * @param string $accountNo
     * @param string $accountName
     * @param string $phone
     * @param int $expireTime
     * @param string $sessionId
     */
    public function __construct(string $accountNo,
                                string $accountName,
                                string $phone,
                                int    $expireTime,
                                string $sessionId)
    {
        $this->accountNo = $accountNo;
        $this->accountName = $accountName;
        $this->phone = $phone;
        $this->expireTime = $expireTime;
        $this->sessionId = $sessionId;
    }

    /**
     * @return string
     */
    public function getAccountNo(): string
    {
        return $this->accountNo;
    }

    /**
     * @param string $accountNo
     */
    public function setAccountNo(string $accountNo): void
    {
        $this->accountNo = $accountNo;
    }

    /**
     * @return string
     */
    public function getAccountName(): string
    {
        return $this->accountName;
    }

    /**
     * @param string $accountName
     */
    public function setAccountName(string $accountName): void
    {
        $this->accountName = $accountName;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return int
     */
    public function getExpireTime(): int
    {
        return $this->expireTime;
    }

    /**
     * @param int $expireTime
     */
    public function setExpireTime(int $expireTime): void
    {
        $this->expireTime = $expireTime;
    }

    /**
     * @return string
     */
    public function getSessionId(): string
    {
        return $this->sessionId;
    }

    /**
     * @param string $sessionId
     */
    public function setSessionId(string $sessionId): void
    {
        $this->sessionId = $sessionId;
    }

}