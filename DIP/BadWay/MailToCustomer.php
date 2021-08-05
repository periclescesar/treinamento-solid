<?php

namespace SOLID\DIP\BadWay;

class MailToCustomer extends Mail
{
    public function __construct(Customer $user)
    {
        parent::__construct($user);

        $this->subject = "Fatura";
        $this->body = "Olá " . $user->getName() . ".";
        $this->body .= "\n o valor da sua assinatura é de R$ " . $user->getPrice();
    }
}
