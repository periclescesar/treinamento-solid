<?php

namespace SOLID\ISP\GoodWay;

interface UserRepository
{
    public function save(User $user): void;
}
