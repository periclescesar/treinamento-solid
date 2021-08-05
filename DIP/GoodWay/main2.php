<?php

namespace SOLID\DIP\GoodWay;

$userRepo = new JsonUserRepository();
$emailService = new PHPEmailService('foiele@solid.com');

$userRepo->openFile();

$useCase = new CreateUserUseCase($userRepo, $emailService);

$useCase->execute();

$userRepo->closeFile();
