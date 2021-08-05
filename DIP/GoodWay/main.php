<?php

namespace SOLID\DIP\GoodWay;

$userRepo = new MysqlUserRepository();
$emailService = new PHPEmailService('naofuieu@solid.com');

$useCase = new CreateUserUseCase($userRepo, $emailService);

$useCase->execute();

