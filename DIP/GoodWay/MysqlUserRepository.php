<?php

namespace SOLID\DIP\GoodWay;

use PDO;
use PDOException;

class MysqlUserRepository implements UserRepository
{
    private PDO $conn;

    public function __construct()
    {
        $this->conn = new PDO('mysql:host=localhost;dbname=test', "userDB", "passDB");
    }

    /**
     * @throws \Exception
     */
    public function save(User $user): void
    {
        try {
            $stmt = $this->conn->prepare(
                'INSERT INTO `users` (name, email, username, password, createAt) VALUES (?,?,?,?,?);'
            );

            $stmt->execute(
                [
                    $user->getName(),
                    $user->getEmail(),
                    $user->getPassword(),
                    $user->getCreateAt()
                ]
            );
        } catch (PDOException $e) {
            throw new \Exception("Erro ao salvar o usuário", 500, $e);
        }
    }

    /**
     * @throws \Exception
     */
    public function deleteDBFile(): void
    {
        throw new \Exception("Do nothing");
    }
}
