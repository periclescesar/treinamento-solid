<?php

namespace SOLID\ISP\GoodWay;

class JsonUserRepository implements UserRepository, JsonDriver
{
    private string $filename = 'users.json';
    private $file;

    public function openFile(): bool
    {
        $this->file = fopen($this->filename, 'w');

        return $this->file != false;
    }

    public function closeFile(): bool
    {
        return fclose($this->file);
    }

    /**
     * @throws \Exception
     */
    public function save(User $user): void
    {
        if (fwrite($this->file, json_encode($user)) == false) {
            throw new \Exception("Erro ao salvar o usuário", 500);
        }
    }
}
