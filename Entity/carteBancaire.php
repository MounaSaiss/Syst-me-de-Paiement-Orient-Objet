<?php
class Carte_bancaire extends Paiment{
    private DateTime $dateExpiration;
    private string $nomBank;
    private int $codeCvs;


    public function __construct($id,$montant,$statu,$datePaiment,$commande,$dateExpiration,$nomBank,$codeCvs) {
        parent::__construct($id,$montant,$statu,$datePaiment,$commande);
        $this->dateExpiration = $dateExpiration;
        $this->nomBank=$nomBank;
        $this->codeCvs=$codeCvs;
    }
    public function set_dateExpiration($dateExpiration){
        $this->dateExpiration=$dateExpiration;
    }
    public function set_nomBank($nomBank){
        $this->nomBank=$nomBank;
    } 
    public function set_codeCvs($codeCvs){
        $this->codeCvs=$codeCvs;
    }
    public function get_dateExpiration(){
        return $this->dateExpiration;
    }
    public function get_nomBank(){
        return $this->nomBank;
    }
    public function get_codeCvs(){
        return $this->codeCvs;
    }
}




