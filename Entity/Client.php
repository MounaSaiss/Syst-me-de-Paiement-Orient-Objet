<?php
class Client{
    private int $id;
    private string $name;
    private string $email;
    private array $commendes;

public function __construct(int $id, string $name,string $email,array $commendes)
{
    $this->id=$id;
    $this->name=$name;
    $this->email=$email;
    $this->commendes=$commendes;
}
public function set_id($id){
    $this->id=$id;
}
public function set_name($name){
    $this->name=$name;
}
public function set_email($email){
    $this->email=$email;
}
public function get_id(){
    return $this->id;
}
public function get_name(){
    return $this->name;
}
public function get_email(){
    return $this->email;
}



}
