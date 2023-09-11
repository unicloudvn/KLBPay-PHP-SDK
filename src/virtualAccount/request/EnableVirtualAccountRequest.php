<?php

namespace src\virtualAccount\request;

use src\base\IRequest;

class EnableVirtualAccountRequest implements IRequest
{
    public $order;
    public $timeout;
    public $fixAmount;
    public $fixContent;
    public $bankAccountNo;

    /**
     * @param int $order
     * @param int $timeout
     * @param int $fixAmount
     * @param string $fixContent
     * @param string $bankAccountNo
     */
    public function __construct(int $order, int $timeout, int $fixAmount, string $fixContent, string $bankAccountNo)
    {
        $this->order = $order;
        $this->timeout = $timeout;
        $this->fixAmount = $fixAmount;
        $this->fixContent = $fixContent;
        $this->bankAccountNo = $bankAccountNo;
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


}
