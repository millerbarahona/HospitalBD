<?php

include_once("Persona.php");
class Medico extends Person {
private $especialidad; 
private $telefono; 
private $direccion;
private $id_es; 


public function __construct()
{
    
}
public function __constructor(string $name, string $email, string $password, int $rol, int $id,  string $especialidad, string $direccion, int $telefono)
{
    $this->nombre = $name; 
    $this->email = $email; 
    $this-> password = $password; 
    $this-> rol = $rol; 
    $this-> id = $id; 
    $this-> especialidad = $especialidad;
    $this-> telefono = $telefono; 
    $this-> direccion = $direccion; 
}
public function getId_es(){
    return $this->id_es; 
}
public function setId_es($id_es){
    $this->id_es = $id_es; 
}
public function getEspecialidad(){
    return $this->especialidad; 
}
public function setEspecialidad($especialidad){
     $this->especialidad = $especialidad; 

}
public function getTelefono(){
    return $this->telefono; 
}
public function setTelefono($telefono){
    $this->telefono = $telefono; 

}
public function getDireccion(){
    return $this->direccion; 
}
public function setDireccion($direccion){
     $this->direccion= $direccion; 

}
public function getName(){
    return $this->name;
}

public function setName($name){
    $this->name = $name;
}

public function getEmail()  {
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

public function getRol(){
    return $this->rol;
}

public function setRol($rol){
    $this->rol = $rol;
}

public function getId(){
    return $this->id;
}

public function setId($id){
    $this->id = $id;
}

public function getEdad(){
    return $this->edad;
}

public  function setEdad($edad){
    $this->edad = $edad;
}

}
function Probar(){
   # $marlon= new Medico(); 
   #$marlon->setName("Marlon");
    #$marlon->getName(); 
    

}
echo Probar(); 


?>