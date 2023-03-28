<?php

namespace src;

use Exception;
use src\client\ThirdPartyClient;
use src\security\PackedMessage;
use src\transaction\request\CancelTransactionRequest;
use src\transaction\request\CreateTransactionRequest;
use src\transaction\request\QueryTransactionRequest;
use src\transaction\request\TransactionRequest;
use src\transaction\response\CancelTransactionResponse;
use src\transaction\response\CreateTransactionResponse;
use src\transaction\response\QueryTransactionResponse;

require_once 'config/config.php';


class KPayClient
{
    private ThirdPartyClient $client;
    private KPayPacker $k_pay_packer;


    public function __construct(KPayPacker $k_pay_packer)
    {
        $this->k_pay_packer = $k_pay_packer;
        $this->client = new ThirdPartyClient();
    }

    public function getKPayPacker(): KPayPacker
    {
        return $this->k_pay_packer;
    }

    /**
     * @throws Exception
     */
    public function execute(string $path, TransactionRequest $request): PackedMessage
    {
        $packed_request = $this->k_pay_packer->encode($request);
        return $this->client->callAPI($this->k_pay_packer->getHost(), $path, $packed_request);
    }

    /**
     * @throws Exception
     */
    public function createTransaction(CreateTransactionRequest $request): CreateTransactionResponse
    {
        $packed_response = $this->execute(CREATE_TRANSACTION_PATH, $request);
        return $this->k_pay_packer->create($packed_response);
    }

    /**
     * @throws Exception
     */
    public function cancelTransaction(CancelTransactionRequest $request): CancelTransactionResponse
    {
        $packed_response = $this->execute(CANCEL_TRANSACTION_PATH, $request);
        return $this->k_pay_packer->cancel($packed_response);
    }

    /**
     * @throws Exception
     */
    public function checkTransaction(QueryTransactionRequest $request): QueryTransactionResponse
    {
        $packed_response = $this->execute(CHECK_TRANSACTION_PATH, $request);
        return $this->k_pay_packer->check($packed_response);
    }

}
