<?php
class Commande{
    private int $id;
    private string $montant ;
    private string $statu;
    private Client $client;
    private array $paimentes;

    public function __construct($id,$montant,$statu,$client,$paimentes) {
        $this->id = $id;
        $this->montant = $montant;
        $this->statu = $statu;
        $this->client=$client;
        $this->paimentes=$paimentes;
    }
    public function set_id($id){
        $this->id=$id;
    }
    public function set_montant($montant){
        $this->montant=$montant;
    }
    public function set_statu($statu){
        $this->statu =$statu;
    }
    public function get_id(){
        return $this->id;
    }
    public function get_montant(){
        return $this->montant;
    }
    public function get_statu(){
        return $this->statu;
    }














}