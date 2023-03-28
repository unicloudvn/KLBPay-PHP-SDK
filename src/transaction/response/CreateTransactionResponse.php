<?php

namespace src\transaction\response;

use src\transaction\model\TransactionStatus;

class CreateTransactionResponse implements TransactionResponse
{
    public string $transaction_id;
    public string $ref_transaction_id;
    public string $pay_link_code;
    public int $timeout;
    public string $url;
    public string $virtual_account;
    public string $description;
    public int $amount;
    public string $qr_code_string;
    public TransactionStatus $status;
    public string $time;

    /**
     * @param string $transaction_id
     * @param string $ref_transaction_id
     * @param string $pay_link_code
     * @param int $timeout
     * @param string $url
     * @param string $virtual_account
     * @param string $description
     * @param int $amount
     * @param string $qr_code_string
     * @param TransactionStatus $status
     * @param string $time
     */
    public function __construct(string $transaction_id, string $ref_transaction_id, string $pay_link_code, int $timeout, string $url, string $virtual_account, string $description, int $amount, string $qr_code_string, TransactionStatus $status, string $time)
    {
        $this->transaction_id = $transaction_id;
        $this->ref_transaction_id = $ref_transaction_id;
        $this->pay_link_code = $pay_link_code;
        $this->timeout = $timeout;
        $this->url = $url;
        $this->virtual_account = $virtual_account;
        $this->description = $description;
        $this->amount = $amount;
        $this->qr_code_string = $qr_code_string;
        $this->status = $status;
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
    public function setTransactionId(string $transaction_id): void
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
    public function getPayLinkCode(): string
    {
        return $this->pay_link_code;
    }

    /**
     * @param string $pay_link_code
     */
    public function setPayLinkCode(string $pay_link_code): void
    {
        $this->pay_link_code = $pay_link_code;
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
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
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
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
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
    public function getQrCodeString(): string
    {
        return $this->qr_code_string;
    }

    /**
     * @param string $qr_code_string
     */
    public function setQrCodeString(string $qr_code_string): void
    {
        $this->qr_code_string = $qr_code_string;
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
