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
    
    public function all() : array
    {
        $query = "SELECT * FROM commendes ";

        $stmt=$this->database->getConnection()->prepare($query);

        $stmt->execute();

        $result = $stmt->fetchAll();
        
        $Commandes = [];

        foreach($result as $Commande) {
            $Commandes[] = new Commande($Commande['id'], $Commande['montant_totale'], $Commande['statut'],$Commande['client_id']);
        }
        return $Commandes;
        // var_dump($Commandes);
    }
    
}
