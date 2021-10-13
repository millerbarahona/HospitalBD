<?php

class Visita {
    private $id;
    private $fecha_visita;
    private $estado_visita;
    private $id_doctor;
    private $id_paciente;
    private $hora_visita;
    private $espe_visita;

    function __construct(){
    }
     function __constructor(int $id, int $id_paciente, int $id_doctor, int  $estado , string $fe_visita, string $h_visita, int $es_visita)
    {
        $this->id = $id; 
        $this->fecha_visita = $fe_visita; 
        $this->estado_visita = $estado; 
        $this->id_doctor = $id_doctor; 
        $this->id_paciente = $id_paciente; 
        $this->hora_visita = $h_visita; 
        $this->espe_visita = $es_visita; 
    }

    public function setId($id){
        $this->id=$id;
    }
    
    public function getId(){
        return $this->id;
    }

    public function getFecha(){
        return $this->fecha_visita;
    }

    
    public function setFecha($fecha){
        $this->fecha_visita=$fecha;
    }
    
    public function getEstado(){
        return $this->estado_visita;
    }

    
    public function setEstado($estado){
        $this->estado_visita=$estado;
    }
    
    public function get_id_doc(){
        return $this->id_doctor;
    }

    
    public function set_id_doc($id_doc){
        $this->id_doctor=$id_doc;
    }

    public function get_id_paci(){
        return $this->id_paciente;
    }

    public function set_id_paci($id_paci){
        $this->id_paciente=$id_paci;
    }

    public function getHora(){
        return $this->hora_visita;
    }

    
    public function setHora($hora){
        $this->hora_visita=$hora;
    }
    
    public function getEspe(){
        return $this->espe_visita;
    }

    
    public function setEspe($espe){
        $this->espe_visita=$espe;
    }
    

}

?>