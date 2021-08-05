<?php

namespace SOLID\DIP\BadWay;

interface UserRepository
{
    public function save(User $user): void;
}
