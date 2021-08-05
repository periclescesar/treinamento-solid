<?php

namespace SOLID\OCP\BadWay;

class User
{
    private string $name;
    private string $email;
    private string $username;
    private string $password;
    private \DateTime $createAt;
    private string $profile;

    public function __construct($name, $email, $username, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->createAt = new \DateTime();
        $this->profile = 'costumer';
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return \DateTime
     */
    public function getCreateAt(): \DateTime
    {
        return $this->createAt;
    }

    public function setAdmin(bool $isAdmin): void
    {
        $this->profile = $isAdmin ? 'admin' : 'costumer';
    }

    /**
     * @throws \Exception
     */
    public function isValid(): bool
    {
        if (substr_count($this->getEmail(), "@") != 1) {
            throw new \Exception("User com e-mail inválido");
        }
        if (strlen($this->getName()) <= 2) {
            throw new \Exception("Nome inválido");
        }

        if (strlen($this->getUsername()) <= 2) {
            throw new \Exception("Username inválido");
        }

        if (strlen($this->getPassword()) <= 2) {
            throw new \Exception("Password inválido");
        }

        if ($this->isAdmin() && substr_count($this->getEmail(), "@cifraclub.com") != 1) {
            throw new \Exception("Este usuário não pode ser administrador");
        }

        return true;
    }

    public function isAdmin(): bool
    {
        return $this->profile == 'admin';
    }
}


