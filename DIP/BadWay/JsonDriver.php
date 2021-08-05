<?php

namespace SOLID\DIP\BadWay;

interface JsonDriver
{
    public function openFile(): bool;
    public function closeFile(): bool;
}
