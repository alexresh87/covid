<?php

namespace App\SaveData;

class SaveDataToDB implements SaveDataInterface
{
    private $dbh;
    private $db_host;
    private $db_name;
    private $db_user;
    private $db_pass;

    public function __construct()
    {
        $this->db_host = "localhost";
        $this->db_name = "covid";
        $this->db_user = "root";
        $this->db_pass = "password";
        try {
            $this->dbh = new \PDO("mysql:host=$this->db_host;dbname=$this->db_name", $this->db_user, $this->db_pass);
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    public function map(array $data): array
    {
        return [];
    }

    public function save($data)
    {
    }
}
