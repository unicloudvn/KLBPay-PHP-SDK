<?php

namespace src\security;

class Credential
{
    private string $client_id;
    private string $secret_key;
    private string $encrypt_key;

    /**
     * @param string $client_id
     * @param string $secret_key
     * @param string $encrypt_key
     */
    public function __construct(string $client_id, string $secret_key, string $encrypt_key)
    {
        $this->client_id = $client_id;
        $this->secret_key = $secret_key;
        $this->encrypt_key = $encrypt_key;
    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return $this->client_id;
    }

    /**
     * @param string $client_id
     */
    public function setClientId(string $client_id): void
    {
        $this->client_id = $client_id;
    }

    /**
     * @return string
     */
    public function getSecretKey(): string
    {
        return $this->secret_key;
    }

    /**
     * @param string $secret_key
     */
    public function setSecretKey(string $secret_key): void
    {
        $this->secret_key = $secret_key;
    }

    /**
     * @return string
     */
    public function getEncryptKey(): string
    {
        return $this->encrypt_key;
    }

    /**
     * @param string $encrypt_key
     */
    public function setEncryptKey(string $encrypt_key): void
    {
        $this->encrypt_key = $encrypt_key;
    }

}
