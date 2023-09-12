<?php

namespace src\virtualaccount\request;

use src\base\IRequest;

class DisableVirtualAccountRequest implements IRequest
{
    public $order;

    /**
     * @param int $order
     */
    public function __construct(int $order)
    {
        $this->order = $order;
    }

    /**
     * @return int
     */
    public function getOrder(): int
    {
        return $this->order;
    }
}
