<?php

namespace src\transaction\request;


class QueryTransactionRequest implements TransactionRequest
{
    public string $transactionId;

    /**
     * @param string $transactionId
     */
    public function __construct(string $transactionId)
    {
        $this->transactionId = $transactionId;
    }

    /**
     * @return string
     */
    public function getTransactionId(): string
    {
        return $this->transactionId;
    }

    /**
     * @param string $transactionId
     */
    public function setTransactionId(string $transactionId): void
    {
        $this->transactionId = $transactionId;
    }

}
