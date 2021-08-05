<?php

namespace SOLID\SRP\GoodWay;

class User
{
    private string $name;
    private string $email;
    private string $username;
    private string $password;
    private \DateTime $createAt;

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

    public function __construct($name, $email, $username, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->createAt = new \DateTime();
    }

    /**
     * @throws \Exception
     */
    public function isValid(): bool
    {
        return UserValidator::validate($this);
    }
}


