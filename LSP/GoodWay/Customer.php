<?php

namespace SOLID\LSP\GoodWay;

class Customer extends User
{
    private float $price;

    public function __construct($name, $email, $username, $password)
    {
        parent::__construct($name, $email, $username, $password);
        $this->price = 20.3;
    }

    public function getPrice(): float
    {
        $discount = 0.1;
        if ($this->getCreateAt() > new \DateTime('2021-01-01')) {
            return $this->price * (1 - $discount);
        }

        return $this->price;
    }
}
