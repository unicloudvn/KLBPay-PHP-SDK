<?php

namespace src\security;

use Exception;

class SecurityUtil
{

    /**
     * @throws Exception
     */
    private function __construct()
    {
        throw new Exception();
    }

    /**
     * @throws Exception
     */
    public static function getSecureRandomKey(int $key_size): string
    {
        $secureRandomKeyBytes = openssl_random_pseudo_bytes($key_size);
        $key = openssl_digest($secureRandomKeyBytes, "SHA256", true);
        return base64_encode($key);
    }

    public static function md5(string $input): string
    {
        return md5($input);
    }

    /**
     * @throws Exception
     */
    public static function encryptAES(string $data, string $key): string
    {
        $iv = hex2bin(substr($key, 0, 32));
        $pri_key = hex2bin($key);
        $data_utf8 = mb_convert_encoding($data, "UTF-8");
        $encryptedData = openssl_encrypt($data_utf8, AES_CIPHER_ALGORITHM, $pri_key, OPENSSL_RAW_DATA, $iv);
        return base64_encode($encryptedData);
    }

    public static function decryptAES(string $data, string $key): string
    {
        $iv = hex2bin(substr($key, 0, 32));
        $key = hex2bin($key);
        return openssl_decrypt(base64_decode($data), AES_CIPHER_ALGORITHM, $key, OPENSSL_RAW_DATA, $iv);
    }

    public static function getEncryptKey(int $key_size): string
    {
        $key = openssl_random_pseudo_bytes($key_size / 8);
        return strtoupper(bin2hex($key));
    }

    public static function getAESKey(int $key_size): string
    {
        $key = openssl_random_pseudo_bytes($key_size / 8);
        return strtoupper(bin2hex($key));
    }

    public static function hmacEncode(string $data, string $key): string
    {
        $hmac = hash_hmac('sha256', $data, $key, true);
        return bin2hex($hmac);
    }

    public static function buildRawSignature(string $client_id, string $timestamp, string $data): string
    {
        return sprintf("%s|%s|%s", $client_id, $timestamp, $data);
    }
}