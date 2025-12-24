<?php
class Carte_bancaire extends Paiment{
    private int $CompteNumber;
    private string $userName;

    public function __construct($id,$montant,$statu,$datePaiment,$commande,$CompteNumber,$userName) {
        parent::__construct($id,$montant,$statu,$datePaiment,$commande);
        $this->CompteNumber = $CompteNumber;
        $this->userName=$userName;
    }
    public function set_CompteNumber($CompteNumber){
        $this->CompteNumber=$CompteNumber;
    }
    public function set_userName($userName){
        $this->userName=$userName;
    } 
    public function get_CompteNumber(){
        return $this->CompteNumber;
    }
    public function get_userName(){
        return $this->userName;
    }
}