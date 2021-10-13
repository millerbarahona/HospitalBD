<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include_once ("Persona.php");
class administrador extends Person {
    protected $edad;
    public function __construct()
    {
        
    }
    public function __constructor(string $name, string $email, string $password, int $rol, int $id, int $edad)
    {
       
        $this->nombre = $name; 
        $this->email = $email; 
        $this->password = $password; 
        $this->rol = $rol; 
        $this->id = $id; 
        $this->edad=$edad;
    }
    public function getEdad(){
        return $this->edad;
    }
    
    public  function setEdad($edad){
        $this->edad = $edad;
    }
    public function getName(){
        return $this->name;
    }
    
    public  function setName($name){
        $this->name = $name;
    }
    
    public  function getEmail(){
        return $this->email;
    }
    
    public function setEmail($email){
        $this->email = $email;
    }
    
    public function getPassword() {
        return $this->password;
    }
    
    public function setPassword($password){
        $this->password = $password;
    }
    
    public  function getRol(){
        return $this->rol;
    }
    
    public function setRol($rol){
        $this->rol = $rol;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public  function setId($id){
        $this->id = $id;
    }
}


?>