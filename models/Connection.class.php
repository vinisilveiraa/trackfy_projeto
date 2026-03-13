<?php

abstract class Connection
{
    public function __construct(protected $db = null)
    {
        $parametros = "mysql:host=localhost;dbname=trackfy_db;charset=utf8mb4";

        try {
            $this->db = new PDO($parametros, "root", "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Problema na conexão");
        }
    }
}
