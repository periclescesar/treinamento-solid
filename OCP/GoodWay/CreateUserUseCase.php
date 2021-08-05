<?php

namespace SOLID\OCP\GoodWay;

class CreateUserUseCase
{
    private UserRepository $userRepository;
    private EmailService $emailService;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->emailService = new EmailService();
    }

    public function execute(): void
    {
        if ($_POST['is_admin']) {
            $user = new Admin($_POST['name'], $_POST['email'], $_POST['email'], $_POST['pass']);
            $mail = new MailAdmin($user);
        } else {
            $user = new User($_POST['name'], $_POST['email'], $_POST['email'], $_POST['pass']);
            $mail = new Mail($user);
        }

        if ($user->isValid()) {
            $this->userRepository->save($user);
            $this->emailService->send($mail);
        }
    }
}
