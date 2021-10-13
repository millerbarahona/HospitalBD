<?php
include ("../Modelo/HClinico.php");
include_once("conexion.php");

class HClinico_DAO
{
    public function __construct(){

    }
  //insertarHC(HClinico = new Hclinico('2021-03-01',4,5,'holaa'));
    public function insertarHC(HClinico $hc){
        $Fecha = $hc->getFecha();
        $idPaciente = $hc->getidPaciete();
        $idDoctor = $hc->getidDoctor();
        $Descripcion = $hc->getDescripcion();
        $ID_es=$hc->getId_es();
        $link = conectar();
        //
        $sql = "INSERT INTO hitorial_clinico  (id_paciente, id_doctor, descripcion, fecha,id_espe) VALUES($idPaciente,$idDoctor,'$Descripcion','$Fecha',$ID_es)";
        $ret = mysqli_query($link,$sql)
            or die("Error al insertar HC".mysqli_error($link));
                echo "<script type= 'text/javascript'> 
               alert( 'REGISTRO SATISFACTORIO'); 
               </script>";
        }

    public function actualizarHC(HClinico $hc){
        $Fecha = $hc->getFecha();
        $Descripcion = $hc->getDescripcion();
        $link = conectar();
        //UPDATE hitorial_clinico SET descricion='ENTROOOOO',fecha ='1998/02/05' WHERE id_paciente=12
        $sql = "UPDATE hitorial_clinico SET descricion='$Descripcion',fecha ='$Fecha' WHERE id_paciente=".$hc->getidPaciete();
        $ret=mysqli_query($link,$sql)
          or die("Error al actualizar Historial Clinico $sql".mysqli_error($link));
            echo "<script type= 'text/javascript'>
            alert('Se actualizo la Historia Clinica');
            </script>";
    }
    public function buscarHC(HClinico $hc)
    {
        $idP = $hc->getidPaciete();
        $link = conectar();
        $sql ="SELECT * FROM hitorial_clinico WHERE id_paciente =".$idP;
        $ret =mysqli_query($link,$sql)
        or die("Error al Buscar Historial Clinico $sql" . mysqli_error($link));
        $this->auxarray = array();
        while( $row = mysqli_fetch_assoc($ret)){
            $this->auxarray[] =$row; 
        }
        $hc->setFecha($this->auxarray[0]['fecha']);
        $hc->setidPaciente($this->auxarray[0]['id_paciente']);
        $hc->setidDoctor($this->auxarray[0]['id_doctor']);
        echo "<script type='text/javascript'>alert('Ups!! Aun no tiene Historial Clinico, Solicita y asiste a tu visita :)');</script>";
        return $hc;
        
    }
    public function eliminarHC(HClinico $hc){
        $idP = $hc->getidPaciete();
        $link = conectar();
        $sql ="DELETE FROM hitorial_clinico WHERE id_paciente=".$idP;
        $ret =mysqli_query($link,$sql)
           or die("Error al Eliminar Historial Clinico $sql" . mysqli_error($link));
           echo "<script type='text/javascript'>alert('Se Elimino el Historial Clinico.$idP.');</script>";
    }

    public function todolosHCuser($id){
        $link = conectar();
        $sql="SELECT * FROM hitorial_clinico where id_paciente =$id";
        $res = mysqli_query($link,$sql);
        $contador =0;
        while($row=mysqli_fetch_assoc($res)){
            $this->lista[]=$row;
            $contador=1;
        }
        if($contador>0){return $this->lista;}
        else{return null;}
    }
    //public function 
}
function prueba(){
    $obj = new HClinico();
    $obj->setFecha("1997/02/05");
    $obj->setidPaciente(12);
    $obj->setidDoctor(12);
    $obj->setDescripcion("ENTROOOOO");
    echo "ESTO SALIOOOOOOO".$obj->getDescripcion();
    $aux= new HClinico();
    $obj2 =new HClinico_DAO();
    $obj2->eliminarHC($obj);
   
}
//echo prueba();
?>