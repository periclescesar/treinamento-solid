<?php

namespace SOLID\DIP\BadWay;

class Admin extends User
{
    public function isValid(): bool
    {
        if (substr_count($this->getEmail(), "@cifraclub.com") != 1) {
            throw new \Exception("Este usuário não pode ser administrador");
        }

        return parent::isValid();
    }
}
