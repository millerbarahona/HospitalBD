<?php
include_once('../ModeloDAO/medicoDAO.php');
include_once('../ModeloDAO/visitasCRUD.php');
include_once('../ModeloDAO/pacienteDAO.php');
if(isset($_POST['id'])){
        $id=$_POST['id'];
        $sql= "SELECT * FROM especialidad WHERE id_doc=$id";
        $res= mysqli_query(conectar(), $sql)
        or die ("Error en la consulta $sql".mysqli_error(conectar()));
        $html ="<option disabled selected value=''>Selecciona una opción</option>";
        while($row= mysqli_fetch_assoc($res)){
         $html .= "<option value='".$row['id']."'>".$row['espe']."</option>";
        }
        echo $html;
}


if(isset($_POST['doc']) && isset($_POST['espe'])&& isset($_POST['dia_c'])&& isset($_POST['hora'])){
        
        if($_POST['doc']==0){
                echo "<script type='text/javascript'>
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Llena toda la informacion!',})
                </script>";
                return false;
        }else if($_POST['espe']==0){
                echo "<script type='text/javascript'>
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Llena toda la informacion!',})
                </script>";
                return false;
        }else if($_POST['dia_c']==''){
                echo "<script type='text/javascript'>
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Llena toda la informacion!',})
                </script>";
        }else if($_POST['hora']==0){
                echo "<script type='text/javascript'>
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Llena toda la informacion!',})
                </script>";
        }else{
                
        }
        
}

if (isset($_POST['fecha'])){
        $fechaactual = date('Y-m-d');
        $dias = array('','Lunes','Martes','Miércoles','Jueves','Viernes','Sabado', 'Domingo');
        $fecha = $dias[date('N', strtotime($_POST['fecha']))];
        $sa= "Sabado";
        $do= "Domingo";
        if(strcmp($fecha, $sa)==0 || strcmp($fecha, $do)==0){
                echo"<script type='text/javascript'>
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Los ".$fecha ."s no se atiende :(',})
                $('#fecha').val(0)
                </script>";
                echo json_encode(array('success' =>1));

        }else if($_POST['fecha']<$fechaactual){
                echo"<script type='text/javascript'>
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ingrese una fecha correcta :(',})
                $('#fecha').val(0)
                </script>";       
        }else{
                $doc = $_POST['doc'];
                if($doc==0){
                        echo"<script type='text/javascript'>
                        Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Seleccione el doctor :(',})
                        $('#fecha').val(0)
                        </script>";    
                }else{
                        $html ="<option disabled selected value=''>Selecciona una opción</option>";
                        $horas =valiHora($doc,$_POST['fecha']);  
                        for($i=0;$i<count($horas);$i++){
                                if($horas[$i]!=""){
                                        $html.="<option value=".$horas[$i].">".$horas[$i]."</option>";
                                }                                
                        }

                        echo $html;
                }
        }
        
      }

function valiHora($doctor,$dia){
        $sql="SELECT * FROM visitas WHERE id_doctor=$doctor and fecha='$dia' and estado='0'";
        $html=array();
        $res= mysqli_query(conectar(), $sql)
        or die ("Error en la consulta $sql".mysqli_error(conectar()));
        while($row1=mysqli_fetch_assoc($res)){
                array_push($html, $row1['hora']);
        }
        $horas = array('08:00','08:30','09:00','09:30','10:00','10:30','11:00','11:30','12:00','12:30','13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30');
        for($j=0;$j<count($horas);$j++){
                $hora1 = $horas[$j].":00";
                for($i=0;$i<count($html);$i++){
                        if($hora1 == $html[$i]){
                                unset($horas[$j]);
                        }
                        
                }
        }
        return $horas;
}