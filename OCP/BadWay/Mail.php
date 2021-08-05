<?php

namespace SOLID\OCP\BadWay;

class Mail
{
    private string $to;
    private string $subject;
    private string $body;

    public function __construct(User $user)
    {
        $this->to = $user->getEmail();

        if ($user->isAdmin()) {
            $this->subject = "Bem vindo, Administrador";
            $this->body = "Olá " . $user->getName() . ", agradecemos a sua escolha para vigiar os vigilantes.";
        } else {
            $this->subject = "Cadastro na watcheria";
            $this->body = "Olá " . $user->getName() . ", agradecemos a sua escolha para ser vigiado.";
        }
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
