<?php

abstract class Paiment {
    protected int $id;
    protected float $montant;
    protected string $statu;
    protected DateTime $datePaiment;
    protected Commande $commande;

    public function __construct($id,$montant,$statu,$datePaiment,$commande) {
        $this->id = $id;
        $this->montant=$montant;
        $this->statu=$statu;
        $this->datePaiment=$datePaiment;
        $this->commande=$commande;
    }
    public function set_id($id){
        $this->id=$id;
    }
    public function set_montant($montant){
        $this->montant=$montant;
    }
    public function set_statu($statu){
        $this->statu=$statu;
    }
    public function set_datePaiment($datePaiment){
        $this->datePaiment=$datePaiment;
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
    public function get_datePaiment(){
        return $this->datePaiment;
    }
}