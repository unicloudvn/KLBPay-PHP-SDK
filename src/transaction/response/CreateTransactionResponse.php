<?php

namespace src\transaction\response;

use src\transaction\model\TransactionStatus;

class CreateTransactionResponse implements TransactionResponse
{
    public string $transactionId;
    public string $refTransactionId;
    public string $payLinkCode;
    public int $timeout;
    public string $url;
    public string $virtualAccount;
    public string $description;
    public int $amount;
    public string $qrCodeString;
    public TransactionStatus $status;
    public string $time;

    /**
     * @param string $transactionId
     * @param string $refTransactionId
     * @param string $payLinkCode
     * @param int $timeout
     * @param string $url
     * @param string $virtualAccount
     * @param string $description
     * @param int $amount
     * @param string $qrCodeString
     * @param TransactionStatus $status
     * @param string $time
     */
    public function __construct(string $transactionId, string $refTransactionId, string $payLinkCode, int $timeout, string $url, string $virtualAccount, string $description, int $amount, string $qrCodeString, TransactionStatus $status, string $time)
    {
        $this->transactionId = $transactionId;
        $this->refTransactionId = $refTransactionId;
        $this->payLinkCode = $payLinkCode;
        $this->timeout = $timeout;
        $this->url = $url;
        $this->virtualAccount = $virtualAccount;
        $this->description = $description;
        $this->amount = $amount;
        $this->qrCodeString = $qrCodeString;
        $this->status = $status;
        $this->time = $time;
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
     * @return string
     */
    public function getPayLinkCode(): string
    {
        return $this->payLinkCode;
    }

    /**
     * @param string $payLinkCode
     */
    public function setPayLinkCode(string $payLinkCode): void
    {
        $this->payLinkCode = $payLinkCode;
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
        return $this->virtualAccount;
    }

    /**
     * @param string $virtualAccount
     */
    public function setVirtualAccount(string $virtualAccount): void
    {
        $this->virtualAccount = $virtualAccount;
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
        return $this->qrCodeString;
    }

    /**
     * @param string $qrCodeString
     */
    public function setQrCodeString(string $qrCodeString): void
    {
        $this->qrCodeString = $qrCodeString;
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
