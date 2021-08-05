<?php

namespace SOLID\DIP\GoodWay;

class CreateUserUseCase
{
    private UserRepository $userRepository;
    private EmailService $emailService;

    /**
     * @param UserRepository $userRepository
     * @param EmailService $emailService
     */
    public function __construct(UserRepository $userRepository, EmailService $emailService)
    {
        $this->userRepository = $userRepository;
        $this->emailService = $emailService;
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
