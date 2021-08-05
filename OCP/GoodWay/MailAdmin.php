<?php

namespace SOLID\OCP\GoodWay;

class MailAdmin extends mail
{
    public function __construct(Admin $user)
    {
        $this->to = $user->getEmail();

        $this->subject = "Bem vindo, Admin";
        $this->body = "Olá " . $user->getName() . ", agradecemos a sua escolha para ser vigiado.";
    }
}
