<?php

namespace SOLID\LSP\BadWay;

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
        } else {
            $user = new User($_POST['name'], $_POST['email'], $_POST['email'], $_POST['pass']);
        }

        if ($user->isValid()) {
            $this->userRepository->save($user);
            $this->emailService->send(new Mail($user));
        }
    }
}
