<?php
require_once 'Client.php';

class Commande
{
    private int | null $id;
    private string $montant;
    private string $statu;
    private Client $client;

    public function __construct(int | null $id, $montant, $statu, $client)
    {
        $this->id = $id;
        $this->montant = $montant;
        $this->statu = $statu;
        $this->client = $client;
    }
    public function set_id($id)
    {
        $this->id = $id;
    }
    public function set_montant($montant)
    {
        $this->montant = $montant;
    }
    public function set_statu($statu)
    {
        $this->statu = $statu;
    }
    public function get_id()
    {
        return $this->id;
    }
    public function get_montant()
    {
        return $this->montant;
    }
    public function get_statu()
    {
        return $this->statu;
    }
    public function get_cleint(): Client
    {
        return $this->client;
    }
}
