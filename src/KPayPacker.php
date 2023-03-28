<?php

namespace src;

use Exception;
use src\exception\PaymentException;
use src\exception\PayResponseCode;
use src\security\PackedMessage;
use src\security\SecurityUtil;
use src\transaction\model\TransactionStatus;
use src\transaction\request\TransactionRequest;
use src\transaction\response\CancelTransactionResponse;
use src\transaction\response\CreateTransactionResponse;
use src\transaction\response\QueryTransactionResponse;

class KPayPacker
{
    private string $client_id;
    private string $encrypt_key;
    private string $secret_key;
    private int $max_timestamp_diff;

    private string $host;

    public function __construct(string $client_id, string $encrypt_key, string $secret_key, string $max_timestamp_diff, string $host)
    {
        $this->client_id = $client_id;
        $this->encrypt_key = $encrypt_key;
        $this->secret_key = $secret_key;
        $this->max_timestamp_diff = $max_timestamp_diff;
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
        if ($packed_message->getClientId() == null || $packed_message->getClientId() !== $this->client_id) {
            throw new PaymentException(PayResponseCode::PAYMENT_INVALID_CLIENT_ID);
        }
        // check timestamp
        $check_time = time() * 1000 - $packed_message->getTimestamp();

        if ($check_time > $this->max_timestamp_diff) {
            error_log("expire payment: $check_time, threshold: $this->max_timestamp_diff");
            throw new PaymentException(PayResponseCode::PAYMENT_TRANSACTION_EXPIRED);
        }
        // check signature
        try {
            $signature = SecurityUtil::hmacEncode(
                SecurityUtil::buildRawSignature($this->client_id, strval($packed_message->getTimestamp()), $packed_message->getEncryptedData()),
                $this->secret_key
            );

            if ($signature != null && $signature === $packed_message->getSignature()) {
                // Decrypt Data
                $decryptBodyString = SecurityUtil::decryptAES($packed_message->getEncryptedData(), $this->encrypt_key);

                return json_decode($decryptBodyString);
            }
        } catch (Exception $e) {
            error_log("authenticate error: {$e->getMessage()}");
        }
        throw new PaymentException(PayResponseCode::PAYMENT_SECURITY_VIOLATION);
    }


    public function create(PackedMessage $packed_message): CreateTransactionResponse
    {
        $decodedResponse = $this->decode($packed_message);

        $status = TransactionStatus::valueOf($decodedResponse->status);
        return new CreateTransactionResponse(
            $decodedResponse->transactionId,
            $decodedResponse->refTransactionId,
            $decodedResponse->payLinkCode,
            $decodedResponse->timeout,
            $decodedResponse->url,
            $decodedResponse->virtualAccount,
            $decodedResponse->description,
            $decodedResponse->amount,
            $decodedResponse->qrCodeString,
            $status,
            $decodedResponse->time
        );
    }

    public function cancel(PackedMessage $packed_message): CancelTransactionResponse
    {
        $decodedResponse = $this->decode($packed_message);

        return new CancelTransactionResponse(
            $decodedResponse->success
        );
    }

    public function check(PackedMessage $packed_message): QueryTransactionResponse
    {
        $decodedResponse = $this->decode($packed_message);
        $status = TransactionStatus::valueOf($decodedResponse->status);
        return new QueryTransactionResponse(
            $status,
            $decodedResponse->refTransactionId,
            $decodedResponse->amount
        );
    }

    /**
     * @throws Exception
     */
    public function encode(TransactionRequest $data): PackedMessage
    {
        $timestamp = time() * 1000;

        try {
            $json_string = json_encode($data);
        } catch (Exception $e) {
            error_log("Parse data error: {$e->getMessage()}");
            throw new PaymentException(PayResponseCode::PAYMENT_TRANSACTION_FAILED);
        }
        $encrypt_data = SecurityUtil::encryptAES($json_string, $this->encrypt_key);
        //encrypt header validation
        $x_api_validate = SecurityUtil::hmacEncode(
            SecurityUtil::buildRawSignature($this->client_id, strval($timestamp), $encrypt_data),
            $this->secret_key
        );

        return new PackedMessage($this->client_id, $timestamp, $x_api_validate, $encrypt_data);
    }

}
