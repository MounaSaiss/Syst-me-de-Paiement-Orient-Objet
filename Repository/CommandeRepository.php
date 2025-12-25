<?php
require_once './config/Database.php';
require_once './Entity/Commande.php';

class CommandeRepository
{
    private Database $database;
    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function ajouter(Commande $command): bool
    {
        $query = "INSERT INTO commendes (montant_totale, statut, client_id) VALUES (:montant, :statut, :client_id)";

        $stmt = $this->database->getConnection()->prepare($query);

        return $stmt->execute([
            ':montant' => $command->get_montant(),
            ':statut' => $command->get_statu(),
            ':client_id' => $command->get_cleint()->get_id(),
        ]);
    }    
}
