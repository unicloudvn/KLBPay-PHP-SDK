<?php
declare(strict_types=1);

namespace src\transaction\response;

use src\transaction\model\TransactionStatus;

/**
 *
 */
class QueryTransactionResponse implements TransactionResponse
{
    public  $status;
    public  $refTransactionId;
    public  $amount;

    /**
     * @param TransactionStatus $status
     * @param string $refTransactionId
     * @param int $amount
     */
    public function __construct(TransactionStatus $status, string $refTransactionId, int $amount)
    {
        $this->status = $status;
        $this->refTransactionId = $refTransactionId;
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
        return $this->refTransactionId;
    }

    /**
     * @param string $refTransactionId
     */
    public function setRefTransactionId(string $refTransactionId): void
    {
        $this->refTransactionId = $refTransactionId;
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
