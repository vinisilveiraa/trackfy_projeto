<?php
require "Connection.class.php";

// herda connection
class UserDAO extends Connection
{
    public function __construct()
    {
        return parent::__construct();
    }

    public function insert(User $user)
    {
        $sql = "INSERT INTO users (nome, email, senha) VALUES(?,?,?)";
        try {
            $stm = $this->db->prepare($sql);

            $stm->bindValue(1, $user->getNome());
            $stm->bindValue(2, $user->getEmail());
            $stm->bindValue(3, $user->getSenha());
            $stm->execute();
            $this->db = null;
        } catch (PDOException $e) {
            $this->db = null;
            return "Problema com o cadastro do usuario";
        }
    }

    public function login($user)
    {
        $sql = "SELECT id_user, email, senha, nome, foto, bio FROM users WHERE email = ?";

        try {
            $stm = $this->db->prepare($sql);

            $stm->bindValue(1, $user->getEmail());
            $stm->execute();
            $this->db = null;

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            $this->db = null;
            return "Problema com o cadastro do usuario";
        }
    }
}
