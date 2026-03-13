<?php

require_once "../models/User.php";
require_once "../models/UserDAO.php";

class AuthController extends Connection
{
    public function __construct()
    {
        parent::__construct(); // cria a conexão
    }


    public function register()
    {
        // var_dump($_POST);
        // die();

        $msg = array("", "", "");

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $senha = $_POST['senha'];
            $confirmar = $_POST['confirmPassword'];

            if ($senha !== $confirmar) {
                return;
            }

            $user = new User();

            $user->setUsername($_POST['username']);
            $user->setEmail($_POST['email']);

            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
            $user->setSenha($senhaHash);

            $dao = new UserDAO;
            $dao->insert($user);

            $msg[1] = 'Conta criada com Sucesso';
            header("Location: /login");
            exit;
        }
        require "../views/auth/register.php";
    }

    public function login()
    {
        $erro = false;
        $msg = array("", "", "");

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            if (empty($_POST["email"])) {
                $msg[0] = "preencha o email";
                $erro = true;
            }
            if (empty($_POST["senha"])) {
                $msg[1] = "preencha a senha";
                $erro = true;
            }

            if (!$erro) {
                $user = new User(email: $_POST['email']);
                $userDao = new UserDAO;
                $retorno = $userDao->login($user);

                if (is_array($retorno)) {
                    if (count($retorno) > 0) {
                        // se senha corresponde
                        if (password_verify($_POST['senha'], $retorno[0]->senha)) {

                            // loga
                            if (!isset($_SESSION)) {
                                session_start();
                            }

                            $_SESSION["id_user"] = $retorno[0]->id_user;
                            $_SESSION["username"] = $retorno[0]->username;
                            $_SESSION["email"] = $retorno[0]->email;
                            $_SESSION["foto"] = $retorno[0]->foto;
                            $_SESSION["bio"] = $retorno[0]->bio;

                            header("Location: /");
                            exit;
                        }
                    } else {
                        $msg[2] = "Verifique os dados!";
                    }
                } else {
                    $msg[2] = "Verifique os dados!!";
                }
            }
        }
        require "../views/auth/login.php";
    }

    public function logout()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION = array();
        session_destroy();

        header("Location: /home");
    }
}
