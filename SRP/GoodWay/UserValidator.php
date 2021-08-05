<?php

namespace SOLID\SRP\GoodWay;

class UserValidator
{
    public static function validate(User $user): bool
    {
        if (substr_count($user->getEmail(), "@") != 1) {
            throw new \Exception("User com e-mail inválido");
        }
        if (strlen($user->getName()) <= 2) {
            throw new \Exception("Nome inválido");
        }

        if (strlen($user->getUsername()) <= 2) {
            throw new \Exception("Username inválido");
        }

        if (strlen($user->getPassword()) <= 2) {
            throw new \Exception("Password inválido");
        }

        return true;
    }
}
