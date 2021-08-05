<?php

namespace SOLID\SRP\GoodWay;

class EmailService
{
    private string $from = 'naofuieu@solid.com';

    /**
     * @throws \Exception
     */
    public function send(string $to): bool
    {
        if (!mail($to, $this->getSubject(), $this->getBody(),  $this->getHeaders())) {
            throw new \Exception("Erro ao enviar email", 500);
        }

        return true;
    }

    /**
     * @return string
     */
    public function getHeaders(): string
    {
        // É necessário indicar que o formato do e-mail é html
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: Não fui eu <' . $this->from . '>';
        return $headers;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return "Seu login foi criado com sucesso: \n Muito obrigado, Boa noite.";
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return "Contato pelo Site";
    }
}
