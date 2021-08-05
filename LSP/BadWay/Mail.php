<?php

namespace SOLID\LSP\BadWay;

class Mail
{
    private string $to;
    private string $subject;
    private string $body;

    public function __construct(Admin $user)
    {
        $this->to = $user->getEmail();

        $this->subject = "Bem vindo, usuário";
        $this->body = "Olá " . $user->getName() . ", agradecemos a sua escolha para ser vigiado.";
        $this->body .= "Sua assinatura tem um valor de " . $user->getPrice() ." reais"; //VIOLAÇÂO
    }

    /**
     * @return string
     */
    public function getTo(): string
    {
        return $this->to;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }
}
