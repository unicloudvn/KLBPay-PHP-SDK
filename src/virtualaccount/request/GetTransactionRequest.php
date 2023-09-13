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
     * @param int|null $size
     * @param int|null $page
     * @param int|null $order
     * @param string|null $bankAccountNo
     * @param string|null $fromDate
     * @param string|null $toDate
     */
    public function __construct(?int $size, ?int $page, ?int $order, ?string $bankAccountNo, ?string $fromDate, ?string $toDate)
    {
        $this->size = $size;
        $this->page = $page;
        $this->order = $order;
        $this->bankAccountNo = $bankAccountNo;
        $this->fromDate = $fromDate;
        $this->toDate = $toDate;
    }

    public function getSize(): ?int
    {
        return $this->size;
    }

    public function setSize(?int $size): void
    {
        $this->size = $size;
    }

    public function getPage(): ?int
    {
        return $this->page;
    }

    public function setPage(?int $page): void
    {
        $this->page = $page;
    }

    public function getOrder(): ?int
    {
        return $this->order;
    }

    public function setOrder(?int $order): void
    {
        $this->order = $order;
    }

    public function getBankAccountNo(): ?string
    {
        return $this->bankAccountNo;
    }

    public function setBankAccountNo(?string $bankAccountNo): void
    {
        $this->bankAccountNo = $bankAccountNo;
    }

    public function getFromDate(): ?string
    {
        return $this->fromDate;
    }

    public function setFromDate(?string $fromDate): void
    {
        $this->fromDate = $fromDate;
    }

    public function getToDate(): ?string
    {
        return $this->toDate;
    }

    public function setToDate(?string $toDate): void
    {
        $this->toDate = $toDate;
    }


}
