<?php

namespace SOLID\LSP\GoodWay;

abstract class User
{
    private string $name;
    private string $email;
    private string $username;
    private string $password;
    private \DateTime $createAt;

    public function __construct($name, $email, $username, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->createAt = new \DateTime();
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

        return true;
    }
}


