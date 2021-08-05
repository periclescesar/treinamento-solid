<?php

namespace SOLID\DIP\BadWay;

$useCase = new CreateUserUseCase(New MysqlUserRepository(), new PHPEmailService());

$useCase->execute();

