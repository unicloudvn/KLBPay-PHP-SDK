<?php

namespace src;



use Exception;
use src\base\IRequest;
use src\client\ThirdPartyClient;
use src\security\PackedMessage;
use src\transaction\request\CancelTransactionRequest;
use src\transaction\request\CreateTransactionRequest;
use src\transaction\request\QueryTransactionRequest;
use src\transaction\response\CancelTransactionResponse;
use src\transaction\response\CreateTransactionResponse;
use src\transaction\response\QueryTransactionResponse;
use src\verify\request\LinkAccountRequest;
use src\verify\request\VerifyLinkAccountRequest;
use src\verify\response\CheckAccountNoResponse;
use src\verify\response\LinkAccountResponse;
use src\verify\response\VerifyLinkAccountResponse;
use src\verifyAccountNo\request\CheckAccountNoRequest;
use src\virtualAccount\request\DisableVirtualAccountRequest;
use src\virtualAccount\request\EnableVirtualAccountRequest;
use src\virtualAccount\request\GetTransactionRequest;
use src\virtualAccount\response\DisableVirtualAccountResponse;
use src\virtualAccount\response\EnableVirtualAccountResponse;
use src\virtualAccount\response\GetTransactionResponse;


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
    public function execute(string $path, IRequest $request): PackedMessage
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
    public function checkAccountNo(CheckAccountNoRequest $request): CheckAccountNoResponse
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

    /**
     * @throws Exception
     */
    public function enableVirtualAccount(EnableVirtualAccountRequest $request): EnableVirtualAccountResponse
    {
        $packed_response = $this->execute(ENABLE_VIRTUAL_ACCOUNT, $request);
        return $this->kPayPacker->enableVirtualAccount($packed_response);
    }

    /**
     * @throws Exception
     */
    public function disableVirtualAccount(DisableVirtualAccountRequest $request): DisableVirtualAccountResponse
    {
        $packed_response = $this->execute(DISABLE_VIRTUAL_ACCOUNT, $request);
        return $this->kPayPacker->disableVirtualAccount($packed_response);
    }

    /**
     * @throws Exception
     */
    public function getTransaction(GetTransactionRequest $request): GetTransactionResponse
    {
        $packed_response = $this->execute(GET_TRANSACTION, $request);
        return $this->kPayPacker->getTransaction($packed_response);
    }

}
