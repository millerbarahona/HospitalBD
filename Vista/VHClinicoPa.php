
<?php
include_once ("../ModeloDAO/HClinicoDAO.php");
include_once ("../Modelo/paciente.php");
include_once ("../ModeloDAO/pacienteDAO.php");
include_once ("../Modelo/medico.php");
include_once ("../ModeloDAO/medicoDAO.php");
include_once ('../Modelo/Sesion.php');



echo historial();
function historial(){

    $sesion = new UsserSession();
    $correo=$sesion->getCurrentCorreo();
    $paci = new Paciente();
    $paci->setEmail($correo);
    $dao = new Paciente_Dao;
    $paciente= $dao->paciente_correo($correo);
    $id=$paciente->getId();


$cadena='<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>HISTORIAL CLINICO</title>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link href="../Vista/CSS/Tablas.css" rel="stylesheet" crossorigin="anonymous">
    
</head>
<body>';


    $contador = 0;
    $obj2 =new HClinico_DAO();
    $vector=$obj2->todolosHCuser($id);
	if($vector!=null){


        for($i=0;$i<count($vector);$i++){
            $contador =$i+1;

$cadena.='<div class="container">
<table  border="1px" class="table table-striped custab" >
<tr>
    <td colspan="8"><h3 align="center"> Historia Clinico Seccion '.$contador.'</h3></td>
</tr>
<tr>
    <th colspan="8">Datos Paciente</th>
</tr>
<tr>
<th align="center" width="200px">Nombre del paciente</th>
<th align="center" width="200px">Tipo Documento</th>
<th align="center" width="200px">N° Dcumento</th>
<th align="center" width="200px">Edad</th>
<th align="center" width="200px">Sexo</th>
<th align="center" width="200px">Fecha Nacimineto</th>
<th align="center" width="200px">Telefono</th>
<th align="center" width="200px">RH</th>
</tr>
<tr>
<tr>
<td align="center">'.(consultapaciente($vector[$i]['id_paciente'])[0]).'</td>
<td align="center">'.(consultapaciente($vector[$i]['id_paciente'])[5]).'</td>
<td align="center">'.$vector[$i]['id_paciente'].'</td>
<td align="center">'.(consultapaciente($vector[$i]['id_paciente'])[1]).'</td>
<td align="center">'.(consultapaciente($vector[$i]['id_paciente'])[3]).'</td>
<td align="center">'.(consultapaciente($vector[$i]['id_paciente'])[4]).'</td>
<td align="center">'.(consultapaciente($vector[$i]['id_paciente'])[2]).'</td>
<td align="center">'.(consultapaciente($vector[$i]['id_paciente'])[6]).'</td>
</tr>
<tr>
<th colspan="8">Datos Doctor responsable</th>
</tr>
<tr>
<th colspan="3" align="center" width="200px">Nombre Doctor</th>
<th colspan="3" align="center" width="200px">Especialidad</th>
<th colspan="2" align="center" width="200px">Telefono</th>
</tr>
<tr>
<td colspan="3" align="center">'.(consultadoctor($vector[$i]['id_doctor'],$vector[$i]['id_espe'])[0]).'</td>
<td colspan="3" align="center">'.(consultadoctor($vector[$i]['id_doctor'],$vector[$i]['id_espe'])[1]).'</td>
<td colspan="3" align="center">'.(consultadoctor($vector[$i]['id_doctor'],$vector[$i]['id_espe'])[2]).'</td>
</tr>
<tr>
<th colspan="8">Historial Medico</th>
</tr>
<tr>
<th colspan="4">Descripcion</th>
<th colspan="4">Fecha</th>
</tr>
<tr>
<td colspan="4" align="center">'.$vector[$i]['descripcion'].'</td>
<td colspan="4" align="center">'.$vector[$i]['fecha'].'</td>
</tr>
</table>
</div>'; 


	}
}
else{echo "<script type='text/javascript'>
    alert('Ups!! Aun no tiene Historial Clinico, Solicita y asiste a tu visita :)');
    </script>";}
    return $cadena;
}

?>
<?php
//funcion

function consultapaciente($id){
    $objP = new Paciente();
    $objP->setId($id);
    $DAO = new Paciente_Dao();
    $auxP=$DAO->paciente($objP);
    $vector= array($auxP->getName(),$auxP->getEdad(),
    $auxP->getTelefono(),$auxP->getSexo(),$auxP->getFecha_nacimiento(),
    $auxP->getTipo_documento(),$auxP->getRh());
    return $vector;

}
function consultadoctor($id,$espe){
    $objP = new Medico();
    $objP->setId($id);
    $objP->setEspecialidad($espe);
    $DAO = new Medico_DAO();
    $auxM=$DAO->ver_medicoEspe($objP);    
    $vector2= array($auxM[0]['nombre'],$auxM[0]['espe'],$auxM[0]['telefono'],$auxM[0]['id_doc']);
    return $vector2;
}
function consultaEspe($id){
    $objP = new Medico();
    $objP->setId($id);
    $DAO = new Medico_DAO();
    $espe=$DAO->especialidades($objP->getId());
    return $espe;
}
?>
<!---<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script> 
-- >