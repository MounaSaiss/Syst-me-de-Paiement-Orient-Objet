<?php
class Database
{
    public PDO $conn;

    public function __construct(
        private $host = "localhost",
        private $db_name = "paiement",
        private $username = "root",
        private $password = ""
    ) {
        $this->conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);

        if (!$this->conn) {
            die('ne pas connnection rasute');
        }
    }
}
