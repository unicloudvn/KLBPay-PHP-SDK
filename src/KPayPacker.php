<?php

namespace src;

use Exception;
use src\base\IRequest;
use src\base\PageResponse;
use src\exception\PaymentException;
use src\security\PackedMessage;
use src\security\SecurityUtil;
use src\transaction\model\TransactionStatus;
use src\transaction\response\CancelTransactionResponse;
use src\transaction\response\CreateTransactionResponse;
use src\transaction\response\QueryTransactionResponse;
use src\verifyaccountno\response\CheckAccountNoResponse;
use src\verifyaccountno\response\LinkAccountResponse;
use src\verifyaccountno\response\VerifyLinkAccountResponse;
use src\virtualaccount\response\DisableVirtualAccountResponse;
use src\virtualaccount\response\EnableVirtualAccountResponse;
use src\virtualaccount\response\GetTransactionResponse;

class KPayPacker
{
    public $clientId;
    public $encryptKey;
    public $secretKey;
    public $maxTimestampDiff;
    public $host;

    /**
     * @param string $clientId
     * @param string $encryptKey
     * @param string $secretKey
     * @param string $maxTimestampDiff
     * @param string $host
     */
    public function __construct(string $clientId,
                                string $encryptKey,
                                string $secretKey,
                                string $maxTimestampDiff,
                                string $host)
    {
        $this->clientId = $clientId;
        $this->encryptKey = $encryptKey;
        $this->secretKey = $secretKey;
        $this->maxTimestampDiff = $maxTimestampDiff;
        $this->host = $host;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    public function decode(PackedMessage $packed_message)
    {
        if ($packed_message->getClientId() == null || $packed_message->getClientId() !== $this->clientId) {
            throw new PaymentException('PAYMENT_INVALID_CLIENT_ID');
        }
        // check timestamp
        $check_time = time() * 1000 - $packed_message->getTimestamp();

        if ($check_time > $this->maxTimestampDiff) {
            error_log("expire payment: $check_time, threshold: $this->maxTimestampDiff");
            throw new PaymentException('PAYMENT_TRANSACTION_EXPIRED');
        }
        // check signature
        try {
            $signature = SecurityUtil::hmacEncode(
                SecurityUtil::buildRawSignature($this->clientId, strval($packed_message->getTimestamp()), $packed_message->getEncryptedData()),
                $this->secretKey
            );

            if ($signature != null && $signature === $packed_message->getSignature()) {
                // Decrypt Data
                $decryptBodyString = SecurityUtil::decryptAES($packed_message->getEncryptedData(), $this->encryptKey);

                return json_decode($decryptBodyString);
            }
        } catch (Exception $e) {
            error_log("authenticate error: {$e->getMessage()}");
        }
        throw new PaymentException('PAYMENT_SECURITY_VIOLATION');
    }


    /**
     * @param PackedMessage $packed_message
     * @return CreateTransactionResponse
     */
    public function create(PackedMessage $packed_message): CreateTransactionResponse
    {
        $decoded_response = $this->decode($packed_message);

        $status = TransactionStatus::valueOf($decoded_response->status);
        return new CreateTransactionResponse(
            $decoded_response->transactionId,
            $decoded_response->refTransactionId,
            $decoded_response->payLinkCode,
            $decoded_response->timeout,
            $decoded_response->url,
            $decoded_response->virtualAccount,
            $decoded_response->description,
            $decoded_response->amount,
            $decoded_response->qrCodeString,
            $status,
            $decoded_response->time,
            $decoded_response->accountName
        );
    }

    /**
     * @param PackedMessage $packed_message
     * @return CancelTransactionResponse
     */
    public function cancel(PackedMessage $packed_message): CancelTransactionResponse
    {
        $decoded_response = $this->decode($packed_message);
        return new CancelTransactionResponse(
            $decoded_response->success
        );
    }

    /**
     * @param PackedMessage $packed_message
     * @return QueryTransactionResponse
     */
    public function check(PackedMessage $packed_message): QueryTransactionResponse
    {
        $decoded_response = $this->decode($packed_message);
        $status = TransactionStatus::valueOf($decoded_response->status);
        return new QueryTransactionResponse(
            $status,
            $decoded_response->refTransactionId,
            $decoded_response->amount
        );
    }

    public function checkAccountNo(PackedMessage $packed_message): CheckAccountNoResponse
    {
        $decoded_response = $this->decode($packed_message);
        return new CheckAccountNoResponse(
            $decoded_response->accountNo,
            $decoded_response->accountName
        );
    }

    public function linkAccount(PackedMessage $packed_message): LinkAccountResponse
    {
        $decoded_response = $this->decode($packed_message);
        return new LinkAccountResponse(
            $decoded_response->accountNo,
            $decoded_response->accountName,
            $decoded_response->phone,
            $decoded_response->expireTime,
            $decoded_response->sessionId
        );
    }

    public function verifyLinkAccount(PackedMessage $packed_message): VerifyLinkAccountResponse
    {
        $decoded_response = $this->decode($packed_message);
        return new VerifyLinkAccountResponse(
            $decoded_response->success
        );
    }

    public function enableVirtualAccount(PackedMessage $packed_message): EnableVirtualAccountResponse
    {
        $decoded_response = $this->decode($packed_message);
        return new EnableVirtualAccountResponse(
            $decoded_response->order,
            $decoded_response->virtualAccount,
            $decoded_response->bankAccountNo,
            $decoded_response->fixAmount,
            $decoded_response->fixContent,
            $decoded_response->qrContent,
            $decoded_response->timeout
        );
    }

    public function disableVirtualAccount(PackedMessage $packed_message): DisableVirtualAccountResponse
    {
        $decoded_response = $this->decode($packed_message);
        return new DisableVirtualAccountResponse(
            $decoded_response->success
        );
    }

    public function getTransaction(PackedMessage $packed_message): PageResponse
    {
        $decoded_response = $this->decode($packed_message);
        $items = [];

        foreach ($decoded_response->items as $itemData) {
            $getTransactionResponse = new GetTransactionResponse(
                $itemData->id,
                $itemData->status,
                $itemData->amount,
                $itemData->refTransactionId,
                $itemData->createDateTime,
                $itemData->completeTime,
                $itemData->virtualAccount,
                $itemData->description,
                $itemData->paymentType,
                $itemData->txnNumber,
                $itemData->accountName,
                $itemData->accountNo,
                $itemData->interBankTrace
            );

            $items[] = $getTransactionResponse;
        }

        return new PageResponse(
            $items,
            $decoded_response->pageNumber,
            $decoded_response->pageSize,
            $decoded_response->totalPage,
            $decoded_response->totalSize
        );

    }

    /**
     * @throws Exception
     */
    public function encode(IRequest $data): PackedMessage
    {
        $timestamp = time() * 1000;

        try {
            $json_string = json_encode($data);
        } catch (Exception $e) {
            error_log("Parse data error: {$e->getMessage()}");
            throw new PaymentException('PAYMENT_TRANSACTION_FAILED');
        }
        $encrypt_data = SecurityUtil::encryptAES($json_string, $this->encryptKey);
        //encrypt header validation
        $x_api_validate = SecurityUtil::hmacEncode(
            SecurityUtil::buildRawSignature($this->clientId, strval($timestamp), $encrypt_data),
            $this->secretKey
        );

        return new PackedMessage($this->clientId, $timestamp, $x_api_validate, $encrypt_data);
    }

}
