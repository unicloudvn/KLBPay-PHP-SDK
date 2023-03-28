<?php

namespace src\webhook;

class NotifyRequest
{
    private string $transaction_id;
    private string $ref_transaction_id;
    private string $virtual_account;
    private string $actual_account;
    private string $from_bin;
    private string $from_account;
    private bool $success;
    private int $amount;
    private string $status_code;
    private string $txn_number;
    private string $transfer_desc;
    private string $time; // yyyy-MM-dd HH:mm:ss

    /**
     * @param string $transaction_id
     * @param string $ref_transaction_id
     * @param string $virtual_account
     * @param string $actual_account
     * @param string $from_bin
     * @param string $from_account
     * @param bool $success
     * @param int $amount
     * @param string $status_code
     * @param string $txn_number
     * @param string $transfer_desc
     * @param string $time
     */
    public function __construct(string $transaction_id, string $ref_transaction_id, string $virtual_account, string $actual_account, string $from_bin, string $from_account, bool $success, int $amount, string $status_code, string $txn_number, string $transfer_desc, string $time)
    {
        $this->transaction_id = $transaction_id;
        $this->ref_transaction_id = $ref_transaction_id;
        $this->virtual_account = $virtual_account;
        $this->actual_account = $actual_account;
        $this->from_bin = $from_bin;
        $this->from_account = $from_account;
        $this->success = $success;
        $this->amount = $amount;
        $this->status_code = $status_code;
        $this->txn_number = $txn_number;
        $this->transfer_desc = $transfer_desc;
        $this->time = $time;
    }

    /**
     * @return string
     */
    public function getTransactionId(): string
    {
        return $this->transaction_id;
    }

    /**
     * @param string $transaction_id
     */
    public function setTransactionId(string $transaction_id)
    {
        $this->transaction_id = $transaction_id;
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
     * @return string
     */
    public function getVirtualAccount(): string
    {
        return $this->virtual_account;
    }

    /**
     * @param string $virtual_account
     */
    public function setVirtualAccount(string $virtual_account): void
    {
        $this->virtual_account = $virtual_account;
    }

    /**
     * @return string
     */
    public function getActualAccount(): string
    {
        return $this->actual_account;
    }

    /**
     * @param string $actual_account
     */
    public function setActualAccount(string $actual_account): void
    {
        $this->actual_account = $actual_account;
    }

    /**
     * @return string
     */
    public function getFromBin(): string
    {
        return $this->from_bin;
    }

    /**
     * @param string $from_bin
     */
    public function setFromBin(string $from_bin): void
    {
        $this->from_bin = $from_bin;
    }

    /**
     * @return string
     */
    public function getFromAccount(): string
    {
        return $this->from_account;
    }

    /**
     * @param string $from_account
     */
    public function setFromAccount(string $from_account): void
    {
        $this->from_account = $from_account;
    }

    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->success;
    }

    /**
     * @param bool $success
     */
    public function setSuccess(bool $success): void
    {
        $this->success = $success;
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

    /**
     * @return string
     */
    public function getStatusCode(): string
    {
        return $this->status_code;
    }

    /**
     * @param string $status_code
     */
    public function setStatusCode(string $status_code): void
    {
        $this->status_code = $status_code;
    }

    /**
     * @return string
     */
    public function getTxnNumber(): string
    {
        return $this->txn_number;
    }

    /**
     * @param string $txn_number
     */
    public function setTxnNumber(string $txn_number): void
    {
        $this->txn_number = $txn_number;
    }

    /**
     * @return string
     */
    public function getTransferDesc(): string
    {
        return $this->transfer_desc;
    }

    /**
     * @param string $transfer_desc
     */
    public function setTransferDesc(string $transfer_desc): void
    {
        $this->transfer_desc = $transfer_desc;
    }

    /**
     * @return string
     */
    public function getTime(): string
    {
        return $this->time;
    }

    /**
     * @param string $time
     */
    public function setTime(string $time): void
    {
        $this->time = $time;
    }

}
