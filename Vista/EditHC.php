<?php
include ("../ModeloDAO/pacienteDAO.php");
include ("../ModeloDAO/medicoDAO.php");
$decrip=$_GET['descrip'];
$idDoc=$_GET['idD'];
$idPaci=$_GET['idP'];
$fecha=$_GET['fecha'];
?>
<?php
function validarP($id,$id2){
    $DAOP = new Paciente_Dao();
    $DAOD= new Medico_DAO();
    if($DAOP->comprobarP($id)){
        if($DAOD->comprobarM($id2)){
            ?>
            <h1>QUE PASA!!!</h1>
            <?php
        }
        else{
            echo "<script type'text/javascript'>alert('N° id Medico no encontrado!!');</script>";
        }
    }
    else{
        echo "<script type'text/javascript'>alert('N° id Paciente no encontrado!!');</script>";
    }
}
?>