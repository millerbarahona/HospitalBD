<?php

class HClinico{
    private $Fecha;
    private $idPaciente;
    private $idDoctor;
    private $Descripcion;
    private $id_es;

    public function __construct(){
          
    }
    
    /*public function __construct($fe,$idp,$idD,$desci){
        $Fecha = $fe;
        $idPaciente =$idp;
        $idDoctor =$idD;
        $Descripcion =$desci;  
    }*/

    public function getFecha(){
        return $this->Fecha;
    }
    public function setFecha($date)
    {
        $this->Fecha=$date;
    }
    public function getId_es(){
        return $this->id_es;
    }
    public function setId_es($es)
    {
        $this-> id_es=$es;
    }
    public function getidPaciete(){
        return $this->idPaciente;
    }
    public function setidPaciente($idP)
    {
        $this->idPaciente=$idP;
    }
    public function getidDoctor(){
        return $this->idDoctor;
    }
    public function setidDoctor($idD)
    {
        $this->idDoctor=$idD;
    }
    public function setDescripcion($des){
        $this->Descripcion = $des;
    }
    public function getDescripcion(){
        return $this->Descripcion;
    }
  
}
?>