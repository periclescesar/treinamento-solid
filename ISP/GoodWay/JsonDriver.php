<?php

namespace SOLID\ISP\GoodWay;

interface JsonDriver
{
    public function openFile(): bool;
    public function closeFile(): bool;
}
