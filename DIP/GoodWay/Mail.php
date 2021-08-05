<?php

namespace SOLID\DIP\GoodWay;

class Mail
{
    private string $to;
    private string $subject;
    private string $body;

    public function __construct(User $user)
    {
        $this->to = $user->getEmail();

        $this->subject = "Bem vindo, usuário";
        $this->body = "Olá " . $user->getName() . ", agradecemos a sua escolha para vigiar os vigilantes.";
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
