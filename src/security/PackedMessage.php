<?php

namespace src\security;

class PackedMessage
{
    public string $client_id;
    public string $signature;
    public int $timestamp;
    public string $encrypted_data;

    /**
     * @param string $client_id
     * @param int $timestamp
     * @param string $signature
     * @param string $encrypted_data
     */
    public function __construct(
        string $client_id,
        int    $timestamp,
        string $signature,
        string $encrypted_data
    )
    {
        $this->encrypted_data = $encrypted_data;
        $this->timestamp = $timestamp;
        $this->signature = $signature;
        $this->client_id = $client_id;
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
    public function getSignature(): string
    {
        return $this->signature;
    }

    /**
     * @param string $signature
     */
    public function setSignature(string $signature): void
    {
        $this->signature = $signature;
    }

    /**
     * @return int
     */
    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    /**
     * @param int $timestamp
     */
    public function setTimestamp(int $timestamp): void
    {
        $this->timestamp = $timestamp;
    }

    /**
     * @return string
     */
    public function getEncryptedData(): string
    {
        return $this->encrypted_data;
    }

    /**
     * @param string $encrypted_data
     */
    public function setEncryptedData(string $encrypted_data): void
    {
        $this->encrypted_data = $encrypted_data;
    }

}
