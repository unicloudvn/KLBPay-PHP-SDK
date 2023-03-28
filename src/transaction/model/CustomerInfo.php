<?php

namespace src\transaction\model;

class CustomerInfo
{
    public string $full_name;
    public string $email;
    public string $phone;
    public string $address;

    /**
     * @param string $full_name
     * @param string $email
     * @param string $phone
     * @param string $address
     */
    public function __construct(string $full_name, string $email, string $phone, string $address)
    {
        $this->full_name = $full_name;
        $this->email = $email;
        $this->phone = $phone;
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->full_name;
    }

    /**
     * @param string $full_name
     */
    public function setFullName(string $full_name): void
    {
        $this->full_name = $full_name;
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
