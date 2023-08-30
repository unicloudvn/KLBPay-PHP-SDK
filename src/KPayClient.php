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
use src\verifyAccount\request\CheckAccountNoRequest;
use src\verifyAccount\request\LinkAccountRequest;
use src\verifyAccount\request\VerifyLinkAccountRequest;
use src\verifyAccount\response\CheckAccountResponse;
use src\verifyAccount\response\LinkAccountResponse;
use src\verifyAccount\response\VerifyLinkAccountResponse;

require_once 'config/config.php';

class KPayClient
{
    public $client;
    public $kPayPacker;


    /**
     * @param KPayPacker $kPayPacker
     */
    public function __construct(KPayPacker $kPayPacker)
    {
        $this->kPayPacker = $kPayPacker;
        $this->client = new ThirdPartyClient();
    }

    /**
     * @return KPayPacker
     */
    public function getKPayPacker(): KPayPacker
    {
        return $this->kPayPacker;
    }

    /**
     * @throws Exception
     */
    public function execute(string $path, TransactionRequest $request): PackedMessage
    {
        $packed_request = $this->kPayPacker->encode($request);
        return $this->client->callAPI($this->kPayPacker->getHost(), $path, $packed_request);
    }

    /**
     * @throws Exception
     */
    public function createTransaction(CreateTransactionRequest $request): CreateTransactionResponse
    {
        $packed_response = $this->execute(CREATE_TRANSACTION_PATH, $request);
        return $this->kPayPacker->create($packed_response);
    }

    /**
     * @throws Exception
     */
    public function cancelTransaction(CancelTransactionRequest $request): CancelTransactionResponse
    {
        $packed_response = $this->execute(CANCEL_TRANSACTION_PATH, $request);
        return $this->kPayPacker->cancel($packed_response);
    }

    /**
     * @throws Exception
     */
    public function checkTransaction(QueryTransactionRequest $request): QueryTransactionResponse
    {
        $packed_response = $this->execute(CHECK_TRANSACTION_PATH, $request);
        return $this->kPayPacker->check($packed_response);
    }

    /**
     * @throws Exception
     */
    public function checkAccountNo(CheckAccountNoRequest $request): CheckAccountResponse
    {
        $packed_response = $this->execute(CHECK_ACCOUNT_NO_PATH, $request);
        return $this->kPayPacker->checkAccountNo($packed_response);
    }

    /**
     * @throws Exception
     */
    public function linkAccountNo(LinkAccountRequest $request): LinkAccountResponse
    {
        $packed_response = $this->execute(LINK_ACCOUNT_PATH, $request);
        return $this->kPayPacker->linkAccount($packed_response);
    }

    /**
     * @throws Exception
     */
    public function verifyLinkAccountNo(VerifyLinkAccountRequest $request): VerifyLinkAccountResponse
    {
        $packed_response = $this->execute(LINK_ACCOUNT_VERIFY_PATH, $request);
        return $this->kPayPacker->verifyLinkAccount($packed_response);
    }

}
