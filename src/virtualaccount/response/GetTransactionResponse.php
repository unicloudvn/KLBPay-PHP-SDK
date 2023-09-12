<?php

namespace src\virtualaccount\response;

use src\base\IRequest;

class GetTransactionResponse implements IRequest
{
    public $id;
    public $status;
    public $amount;
    public $refTransactionId;
    public $createDateTime;
    public $completeTime;
    public $virtualAccount;
    public $description;
    public $paymentType;
    public $txnNumber;
    public $accountName;
    public $accountNo;
    public $interBankTrace;

    /**
     * @param string $id
     * @param string $status
     * @param int $amount
     * @param string|null $refTransactionId
     * @param string $createDateTime
     * @param string $completeTime
     * @param string $virtualAccount
     * @param string $description
     * @param string $paymentType
     * @param string $txnNumber
     * @param string $accountName
     * @param string $accountNo
     * @param string $interBankTrace
     */
    public function __construct(string $id,
                                string $status,
                                int    $amount,
                                ?string $refTransactionId,
                                string $createDateTime,
                                string $completeTime,
                                string $virtualAccount,
                                string $description,
                                string $paymentType,
                                string $txnNumber,
                                string $accountName,
                                string $accountNo,
                                string $interBankTrace)
    {
        $this->id = $id;
        $this->status = $status;
        $this->amount = $amount;
        $this->refTransactionId = $refTransactionId;
        $this->createDateTime = $createDateTime;
        $this->completeTime = $completeTime;
        $this->virtualAccount = $virtualAccount;
        $this->description = $description;
        $this->paymentType = $paymentType;
        $this->txnNumber = $txnNumber;
        $this->accountName = $accountName;
        $this->accountNo = $accountNo;
        $this->interBankTrace = $interBankTrace;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param string $amount
     */
    public function setAmount(string $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return string|null
     */
    public function getRefTransactionId(): ?string
    {
        return $this->refTransactionId;
    }

    /**
     * @param string|null $refTransactionId
     */
    public function setRefTransactionId(?string $refTransactionId): void
    {
        $this->refTransactionId = $refTransactionId;
    }

    /**
     * @return string
     */
    public function getCreateDateTime(): string
    {
        return $this->createDateTime;
    }

    /**
     * @param string $createDateTime
     */
    public function setCreateDateTime(string $createDateTime): void
    {
        $this->createDateTime = $createDateTime;
    }

    /**
     * @return string
     */
    public function getCompleteTime(): string
    {
        return $this->completeTime;
    }

    /**
     * @param string $completeTime
     */
    public function setCompleteTime(string $completeTime): void
    {
        $this->completeTime = $completeTime;
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
     * @return string
     */
    public function getPaymentType(): string
    {
        return $this->paymentType;
    }

    /**
     * @param string $paymentType
     */
    public function setPaymentType(string $paymentType): void
    {
        $this->paymentType = $paymentType;
    }

    /**
     * @return string
     */
    public function getTxnNumber(): string
    {
        return $this->txnNumber;
    }

    /**
     * @param string $txnNumber
     */
    public function setTxnNumber(string $txnNumber): void
    {
        $this->txnNumber = $txnNumber;
    }

    /**
     * @return string
     */
    public function getAccountName(): string
    {
        return $this->accountName;
    }

    /**
     * @param string $accountName
     */
    public function setAccountName(string $accountName): void
    {
        $this->accountName = $accountName;
    }

    /**
     * @return string
     */
    public function getAccountNo(): string
    {
        return $this->accountNo;
    }

    /**
     * @param string $accountNo
     */
    public function setAccountNo(string $accountNo): void
    {
        $this->accountNo = $accountNo;
    }

    /**
     * @return string
     */
    public function getInterBankTrace(): string
    {
        return $this->interBankTrace;
    }

    /**
     * @param string $interBankTrace
     */
    public function setInterBankTrace(string $interBankTrace): void
    {
        $this->interBankTrace = $interBankTrace;
    }

}
