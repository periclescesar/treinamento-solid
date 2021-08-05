<?php

namespace SOLID\SRP\BadWay;

use PDO;
use PDOException;

class User
{
    private string $nome;
    private string $email;
    private string $username;
    private string $password;
    private \DateTime $dataCadastro;

    public function adicionarUser($nome, $email, $username, $password): string
    {
        if (substr_count($email, "@") == 1) {
            $this->email = $email;

            if (strlen($nome) > 2) {
                $this->nome = $nome;

                if (strlen($username) > 2) {
                    $this->username = $username;

                    if (strlen($password) > 2) {
                        $this->password = $password;
                    } else {
                        throw new \Exception("Password inválido");
                    }
                } else {
                    throw new \Exception("Username inválido");
                }
            } else {
                throw new \Exception("Nome inválido");
            }
        } else {
            throw new \Exception("User com e-mail inválido");
        }

        $this->dataCadastro = new \DateTime();


        try {
            $dbh = new PDO('mysql:host=localhost;dbname=test', "userDB", "passDB");
            $stmt = $dbh->prepare(
                'INSERT INTO `promocoes`.`cadastros` (name, mail, user, pass, createAt) VALUES (?,?,?,?,?);'
            );
            $stmt->execute(
                [
                    $this->nome,
                    $this->email,
                    $this->password,
                    $this->dataCadastro
                ]
            );

            $dbh = null;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

        //enviar

        // emails para quem será enviado o formulário
        $emailenviar = "seuemail@seudominio.com.br";
        $destino = $emailenviar;
        $assunto = "Contato pelo Site";
        $body = "Seu login foi criado com sucesso:";
        $body .= "username: " . $this->username;
        $body .= "password: " . $this->password;
        $body .= "Muito obrigado, Boa noite.";

        // É necessário indicar que o formato do e-mail é html
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'From: Não fui eu <naofuieu@solid.com>';

        $enviaremail = mail($destino, $assunto, $body, $headers);
        if ($enviaremail) {
            $mgm = "E-MAIL ENVIADO COM SUCESSO! <br> O link será enviado para o e-mail fornecido no formulário";
            echo " <meta http-equiv='refresh' content='10;URL=contato.php'>";
        } else {
            $mgm = "ERRO AO ENVIAR E-MAIL!";
            echo "";
        }

        return "Success";
    }
}

$u = new User();
echo $u->adicionarUser($_POST['name'], $_POST['email'], $_POST['email'], $_POST['pass']);
