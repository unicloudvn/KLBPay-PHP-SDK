<?php

namespace src\transaction\response;

use src\transaction\model\TransactionStatus;

class QueryTransactionResponse implements TransactionResponse
{
    public TransactionStatus $status;
    public string $ref_transaction_id;
    public int $amount;

    /**
     * @param TransactionStatus $status
     * @param string $ref_transaction_id
     * @param int $amount
     */
    public function __construct(TransactionStatus $status, string $ref_transaction_id, int $amount)
    {
        $this->status = $status;
        $this->ref_transaction_id = $ref_transaction_id;
        $this->amount = $amount;
    }

    /**
     * @return TransactionStatus
     */
    public function getStatus(): TransactionStatus
    {
        return $this->status;
    }

    /**
     * @param TransactionStatus $status
     */
    public function setStatus(TransactionStatus $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getRefTransactionId(): string
    {
        return $this->ref_transaction_id;
    }

    /**
     * @param string $ref_transaction_id
     */
    public function setRefTransactionId(string $ref_transaction_id): void
    {
        $this->ref_transaction_id = $ref_transaction_id;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

}
