<?php

namespace SOLID\DIP\GoodWay;

interface UserRepository
{
    public function save(User $user): void;
}
