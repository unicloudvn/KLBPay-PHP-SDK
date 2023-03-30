<?php

namespace src\transaction\model;

class CustomerInfo
{
    public string $fullName;
    public string $email;
    public string $phone;
    public string $address;

    /**
     * @param string $fullName
     * @param string $email
     * @param string $phone
     * @param string $address
     */
    public function __construct(string $fullName, string $email, string $phone, string $address)
    {
        $this->fullName = $fullName;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->fullName;
    }

    /**
     * @param string $fullName
     */
    public function setFullName(string $fullName): void
    {
        $this->fullName = $fullName;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

}
