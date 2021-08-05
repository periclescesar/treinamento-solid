<?php

namespace SOLID\DIP\BadWay;

class CreateUserUseCase
{
    private UserRepository $userRepository;
    private PHPEmailService $emailService;

    public function __construct()
    {
        $this->userRepository = new MysqlUserRepository();
        $this->emailService = new PHPEmailService();
    }

    public function execute(): void
    {
        if ($_POST['is_admin']) {
            $user = new Admin($_POST['name'], $_POST['email'], $_POST['email'], $_POST['pass']);
        } else {
            $user = new Customer($_POST['name'], $_POST['email'], $_POST['email'], $_POST['pass']);
        }

        if ($user->isValid()) {
            $this->userRepository->save($user);
            $mail = new Mail($user);
            $this->emailService->send($mail);

            if (is_a($user, Customer::class)) {
                $invoice = new MailToCustomer($user);
                $this->emailService->send($invoice);
            }
        }
    }
}
