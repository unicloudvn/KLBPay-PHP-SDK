<?php

namespace src\virtualAccount\response;

use src\base\IResponse;

class EnableVirtualAccountResponse implements IResponse
{
    public $order;
    public $virtualAccount;
    public $bankAccountNo;
    public $fixAmount;
    public $fixContent;
    private $qrContent;
    private $timeout;

    /**
     * @param int $order
     * @param string $virtualAccount
     * @param string $bankAccountNo
     * @param int $fixAmount
     * @param string $fixContent
     * @param string $qrContent
     * @param int $timeout
     */
    public function __construct(int $order, 
                                string $virtualAccount, 
                                string $bankAccountNo, 
                                int $fixAmount, 
                                string $fixContent, 
                                string $qrContent, 
                                int $timeout)
    {
        $this->order = $order;
        $this->virtualAccount = $virtualAccount;
        $this->bankAccountNo = $bankAccountNo;
        $this->fixAmount = $fixAmount;
        $this->fixContent = $fixContent;
        $this->qrContent = $qrContent;
        $this->timeout = $timeout;
    }

    /**
     * @return int
     */
    public function getOrder(): int
    {
        return $this->order;
    }

    /**
     * @param int $order
     */
    public function setOrder(int $order): void
    {
        $this->order = $order;
    }

    /**
     * @return string
     */
    public function getVirtualAccount(): string
    {
        return $this->virtualAccount;
    }

    /**
     * @param string $virtualAccount
     */
    public function setVirtualAccount($virtualAccount): void
    {
        $this->virtualAccount = $virtualAccount;
    }

    /**
     * @return string
     */
    public function getBankAccountNo(): string
    {
        return $this->bankAccountNo;
    }

    /**
     * @param string $bankAccountNo
     */
    public function setBankAccountNo(string $bankAccountNo): void
    {
        $this->bankAccountNo = $bankAccountNo;
    }

    /**
     * @return int
     */
    public function getFixAmount(): int
    {
        return $this->fixAmount;
    }

    /**
     * @param int $fixAmount
     */
    public function setFixAmount(int $fixAmount): void
    {
        $this->fixAmount = $fixAmount;
    }

    /**
     * @return string
     */
    public function getFixContent(): string
    {
        return $this->fixContent;
    }

    /**
     * @param string $fixContent
     */
    public function setFixContent(string $fixContent): void
    {
        $this->fixContent = $fixContent;
    }

    /**
     * @return string
     */
    public function getQrContent(): string
    {
        return $this->qrContent;
    }

    /**
     * @param string $qrContent
     */
    public function setQrContent(string $qrContent): void
    {
        $this->qrContent = $qrContent;
    }

    /**
     * @return int
     */
    public function getTimeout(): int
    {
        return $this->timeout;
    }

    /**
     * @param int $timeout
     */
    public function setTimeout(int $timeout): void
    {
        $this->timeout = $timeout;
    }


}
