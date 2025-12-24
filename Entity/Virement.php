<?php
class Carte_bancaire extends Paiment{
    private int $reference;
    private string $fromName;

    public function __construct($id,$montant,$statu,$datePaiment,$commande,$reference,$fromName) {
        parent::__construct($id,$montant,$statu,$datePaiment,$commande);
        $this->reference = $reference;
        $this->fromName=$fromName;
    }
    public function set_reference($reference){
        $this->reference=$reference;
    }
    public function set_fromName($fromName){
        $this->fromName=$fromName;
    } 
    public function get_reference(){
        return $this->reference;
    }
    public function get_fromName(){
        return $this->fromName;
    }
}