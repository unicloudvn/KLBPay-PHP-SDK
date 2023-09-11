<?php

namespace src\virtualAccount\response;

use src\virtualAccount\request\GetTransactionRequest;

class PageResponse
{
    private $items;
    private $pageNumber;
    private $pageSize;
    private $totalSize;
    private $totalPage;

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

    /**
     * @return int
     */
    public function getTotalPage(): int
    {
        return $this->totalPage;
    }

    /**
     * @param float|int $totalPage
     */
    public function setTotalPage($totalPage): void
    {
        $this->totalPage = $totalPage;
    }

    public function __construct(array $items, $pageNumber, $pageSize, $totalSize)
    {
        $this->items = $items;
        $this->pageNumber = $pageNumber;
        $this->pageSize = $pageSize;
        $this->totalSize = $totalSize;
        $this->totalPage = ceil($totalSize / $pageSize);
    }

    public static function fromGetTransactionRequest(GetTransactionRequest $request, array $data): PageResponse
    {
        $pageNumber = $request->getPage();
        $pageSize = $request->getSize();
        $totalSize = count($data);
        $items = array_slice($data, ($pageNumber - 1) * $pageSize, $pageSize);

        return new PageResponse($items, $pageNumber, $pageSize, $totalSize);
    }
}
