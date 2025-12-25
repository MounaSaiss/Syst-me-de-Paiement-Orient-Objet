<?php
require_once './config/Database.php';
require_once './Entity/Client.php';

class ClientRepository
{
    private Database $database;
    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function ajouter(Client $client): bool
    {
        $query = "INSERT INTO client (nom, email) VALUES (:nom, :email)";

        $stmt = $this->database->getConnection()->prepare($query);

        return $stmt->execute([
            ':nom' => $client->get_name(),
            ':email' => $client->get_email(),
        ]);
    }
    public function all() : array
    {
        $query = "SELECT * FROM client";

        $stmt = $this->database->getConnection()->prepare($query);

        $stmt->execute();

        $result = $stmt->fetchAll();
        
        $clients = [];

        foreach($result as $item) {
            $clients[] = new Client($item['id'], $item['nom'], $item['email']);
        }

        return $clients;
    }

    
}
