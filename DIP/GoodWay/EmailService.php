<?php

namespace SOLID\DIP\GoodWay;

interface EmailService
{
    public function send(Mail $mail);
}
