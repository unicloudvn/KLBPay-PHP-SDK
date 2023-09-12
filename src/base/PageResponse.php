<?php

namespace src\base;

class PageResponse
{
    public $items = [];
    public $pageNumber;
    public $pageSize;
    public $totalPage;
    public $totalSize;

    /**
     * @param array $items
     * @param int $pageNumber
     * @param int $pageSize
     * @param int $totalPage
     * @param int $totalSize
     */
    public function __construct(array $items, int $pageNumber, int $pageSize, int $totalPage, int $totalSize)
    {
        $this->items = $items;
        $this->pageNumber = $pageNumber;
        $this->pageSize = $pageSize;
        $this->totalPage = $totalPage;
        $this->totalSize = $totalSize;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    /**
     * @return int
     */
    public function getPageNumber(): int
    {
        return $this->pageNumber;
    }

    /**
     * @param int $pageNumber
     */
    public function setPageNumber(int $pageNumber): void
    {
        $this->pageNumber = $pageNumber;
    }

    /**
     * @return int
     */
    public function getPageSize(): int
    {
        return $this->pageSize;
    }

    /**
     * @param int $pageSize
     */
    public function setPageSize(int $pageSize): void
    {
        $this->pageSize = $pageSize;
    }

    /**
     * @return int
     */
    public function getTotalPage(): int
    {
        return $this->totalPage;
    }

    /**
     * @param int $totalPage
     */
    public function setTotalPage(int $totalPage): void
    {
        $this->totalPage = $totalPage;
    }

    /**
     * @return int
     */
    public function getTotalSize(): int
    {
        return $this->totalSize;
    }

    /**
     * @param int $totalSize
     */
    public function setTotalSize(int $totalSize): void
    {
        $this->totalSize = $totalSize;
    }
}