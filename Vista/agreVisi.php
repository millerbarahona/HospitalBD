<?php
include_once('../ModeloDAO/medicoDAO.php');
include_once('../ModeloDAO/visitasCRUD.php');
include_once('../ModeloDAO/pacienteDAO.php');

if(isset($_GET['doc']) && isset($_GET['espe'])&& isset($_GET['dia_c'])&& isset($_GET['hora'])){
$correo = $_GET['core'];
                $paciente = new Paciente();
                $Dao = new Paciente_Dao();
                $visita = new Visita();
                $visita1 = new Visitas(); //dao de visitas
                $paciente->setEmail($correo);
                $paciente1 = $Dao->ver_paciente2($paciente);  
                $id_paci = $paciente1['id_doc'] ;
                $id_doc = $_GET['doc'];
                $dia = $_GET['dia_c'];
                $espe = $_GET['espe'];
                $hora = $_GET ['hora'].":00";
                $visita->set_id_paci($id_paci);
                $visita->set_id_doc($id_doc);
                $visita->setEstado(0);
                $visita->setFecha($dia);
                $visita->setEspe($espe);
                $visita->setHora($hora);
                $visita1->new_visita($visita);
            }    
?>