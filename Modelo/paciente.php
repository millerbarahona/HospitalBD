<?php

include_once ("Persona.php");

class Paciente extends Person {

    private  $Rh;
    private  $Telefono; 
    private  $Sexo;
    private  $Fecha_Nacimiento;
    private  $Direccion;
    private  $Tipo_documento;


    function __construct()
    {
        
    }

    function __constructor(string $name, string $email, string $password, int $rol, int $id, int $edad,
        string $Rh, string $Telefono, string $Sexo, string $Fecha_Nacimiento, string $Direccion, string $Tipo_documento )
    {
        $this->nombre = $name; 
        $this->email = $email; 
        $this->password = $password; 
        $this->rol = $rol; 
        $this->id = $id;
        $this->edad=$edad; 
        $this->Rh=$Rh;
        $this->Telefono=$Telefono;
        $this->Sexo=$Sexo;
        $this->Fecha_Nacimiento=$Fecha_Nacimiento;
        $this->Direccion=$Direccion;
        $this->Tipo_documento=$Tipo_documento;

    }

    public function getEdad(){
        return $this->edad;
    }
    
    public  function setEdad($edad){
        $this->edad = $edad;
    }

    public function getName(): string{
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

    public function getRh(): string{
        return $this->Rh;
    }

    
    public function setRh($Rh){
        return $this->Rh=$Rh;
    }
    
    public function getTelefono(): string{
        return $this->Telefono;
    }
    
    public function setTelefono($Telefono){
        return $this->Telefono=$Telefono;
    }
    
    public function getSexo(): string{
        return $this->Sexo;
    }
    
    public function setSexo($Sexo){
        return $this->Sexo=$Sexo;
    }
    
    public function getFecha_nacimiento(): string{
        return $this->Fecha_Nacimiento;
    }
    
    public function setFecha_nacimiento($Fecha_Nacimiento){
        return $this->Fecha_Nacimiento=$Fecha_Nacimiento;
    }
    
    public function getDireccion(): string{
        return $this->Direccion;
    }
    
    public function setDireccion($Direccion){
        return $this->Direccion=$Direccion;
    }
    
    public function getTipo_documento(): string{
        return $this->Tipo_documento;
    }
    
    public function setTipo_documento($Tipo_documento){
        return $this->Tipo_documento=$Tipo_documento;
    }
    
}
?>