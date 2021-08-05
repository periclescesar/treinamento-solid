<?php

namespace SOLID\ISP\BadWay;

interface UserRepository
{
    public function openFile(): bool;

    public function closeFile(): bool;

    public function save(User $user): void;
}
