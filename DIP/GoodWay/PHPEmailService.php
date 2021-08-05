<?php

namespace SOLID\DIP\GoodWay;

class PHPEmailService implements EmailService
{
    private string $from;

    /**
     * @param string $from
     */
    public function __construct(string $from)
    {
        $this->from = $from;
    }

    /**
     * @throws \Exception
     */
    public function send(Mail $mail): void
    {
        if (!mail($mail->getTo(), $mail->getSubject(), $mail->getBody(),  $this->getHeaders())) {
            throw new \Exception("Erro ao enviar email", 500);
        }
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
}
