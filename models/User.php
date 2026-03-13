<?php

class User
{
    public function __construct(
        private int $id_user = 0,
        private string $nome = "",
        private string $email = "",
        private string $senha = "",
        private string $foto = "",
        private string $bio = "",
        
        private ?string $created_at = null,
        private ?string $updated_at = null

    ) {}

    // getters
    public function getId_user()
    {
        return $this->id_user;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getSenha()
    {
        return $this->senha;
    }
    public function getFoto()
    {
        return $this->foto;
    }
    public function getBio()
    {
        return $this->bio;
    }
    public function getCreated_at()
    {
        return $this->created_at;
    }
    public function getUpdated_at()
    {
        return $this->updated_at;
    }


    // setters
    public function setId_user($id)
    {
        $this->id_user = $id;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }
    public function setFoto($foto)
    {
        $this->foto = $foto;
    }
    public function setBio($bio)
    {
        $this->bio = $bio;
    }
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;
    }
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;
    }
}
