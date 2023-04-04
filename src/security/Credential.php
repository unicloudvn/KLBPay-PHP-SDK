<?php

namespace src\security;

/**
 *
 */
class Credential
{
    private string $clientId;
    private string $secretKey;
    private string $encryptKey;

    /**
     * @param string $clientId
     * @param string $secretKey
     * @param string $encryptKey
     */
    public function __construct(string $clientId, string $secretKey, string $encryptKey)
    {
        $this->clientId = $clientId;
        $this->secretKey = $secretKey;
        $this->encryptKey = $encryptKey;
    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return $this->clientId;
    }

    /**
     * @param string $clientId
     */
    public function setClientId(string $clientId): void
    {
        $this->clientId = $clientId;
    }

    /**
     * @return string
     */
    public function getSecretKey(): string
    {
        return $this->secretKey;
    }

    /**
     * @param string $secretKey
     */
    public function setSecretKey(string $secretKey): void
    {
        $this->secretKey = $secretKey;
    }

    /**
     * @return string
     */
    public function getEncryptKey(): string
    {
        return $this->encryptKey;
    }

    /**
     * @param string $encryptKey
     */
    public function setEncryptKey(string $encryptKey): void
    {
        $this->encryptKey = $encryptKey;
    }

}
