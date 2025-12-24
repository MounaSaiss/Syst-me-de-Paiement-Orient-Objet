<?php
class Client{
    private int $id;
    private string $name;
    private string $email;

public function __construct($id,$name,$email)
{
    $this->id=$id;
    $this->name=$name;
    $this->email=$email;
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
