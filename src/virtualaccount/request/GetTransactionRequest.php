<?php

namespace src\virtualaccount\request;

use src\base\IRequest;

class GetTransactionRequest implements IRequest
{
    public $size;
    public $page;
    public $order;
    public $bankAccountNo;
    public $fromDate;
    public $toDate;

    /**
     * @param $size
     * @param $page
     * @param $order
     * @param $bankAccountNo
     * @param $fromDate
     * @param $toDate
     */
    public function __construct($size, $page, $order, $bankAccountNo, $fromDate, $toDate)
    {
        $this->size = $size;
        $this->page = $page;
        $this->order = $order;
        $this->bankAccountNo = $bankAccountNo;
        $this->fromDate = $fromDate;
        $this->toDate = $toDate;
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
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @param int $page
     */
    public function setPage(int $page): void
    {
        $this->page = $page;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @param int $size
     */
    public function setSize(int $size): void
    {
        $this->size = $size;
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
     * @return string
     */
    public function getFromDate(): string
    {
        return $this->fromDate;
    }

    /**
     * @param string $fromDate
     */
    public function setFromDate(string $fromDate): void
    {
        $this->fromDate = $fromDate;
    }

    /**
     * @return string
     */
    public function getToDate(): string
    {
        return $this->toDate;
    }

    /**
     * @param string $toDate
     */
    public function setToDate(string $toDate): void
    {
        $this->toDate = $toDate;
    }

}
