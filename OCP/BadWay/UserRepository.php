<?php

namespace SOLID\OCP\BadWay;

use PDO;
use PDOException;

class UserRepository
{
    private PDO $conn;

    public function __construct()
    {
        $this->conn = new PDO('mysql:host=localhost;dbname=test', "userDB", "passDB");
    }

    /**
     * @throws \Exception
     */
    public function save(User $user): bool
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

            return true;
        } catch (PDOException $e) {
            throw new \Exception("Erro ao salvar o usuário", 500, $e);
        }
    }
}
