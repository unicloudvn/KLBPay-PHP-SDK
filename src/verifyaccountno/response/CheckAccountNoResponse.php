<?php

namespace src\verifyaccountno\response;

use src\base\IResponse;

class CheckAccountNoResponse implements IResponse
{
    private  $accountNo;
    private  $accountName;

    /**
     * @param string $accountNo
     * @param string $accountName
     */
    public function __construct(string $accountNo, string $accountName)
    {
        $this->accountNo = $accountNo;
        $this->accountName = $accountName;
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


}