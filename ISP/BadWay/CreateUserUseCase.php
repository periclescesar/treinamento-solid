<?php

namespace SOLID\ISP\BadWay;

class CreateUserUseCase
{
    private UserRepository $userRepository;
    private EmailService $emailService;

    public function __construct()
    {
        $this->userRepository = new JsonUserRepository();
        $this->emailService = new EmailService();
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
