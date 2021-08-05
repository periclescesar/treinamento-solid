<?php

namespace SOLID\OCP\BadWay;

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
        $user = new User($_POST['name'], $_POST['email'], $_POST['email'], $_POST['pass']);

        $user->setAdmin($_POST['is_admin']);

        if ($user->isValid()) {
            $this->userRepository->save($user);
            $this->emailService->send(new Mail($user));
        }
    }
}
