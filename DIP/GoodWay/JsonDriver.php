<?php

namespace SOLID\DIP\GoodWay;

interface JsonDriver
{
    public function openFile(): bool;
    public function closeFile(): bool;
}
