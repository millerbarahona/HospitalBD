<?php
include ('../Modelo/visita.php');
include_once('conexion.php');
    
class Visitas{
    
    private $visitas;

    public function __construct(){
        $this->visitas=array();
    }

    public function ver_visitas(){ //funciona jeje
        $sql="select * from visitas";
        $res=mysqli_query(conectar(),$sql);
        while($row=mysqli_fetch_assoc($res)){
            $this->visitas[]=$row;
        }
        return $this->visitas;
    }

    public function editVisita(Visita $visita ){  //funciona jeje
        $fecha =$visita->getFecha();
        $estado = $visita->getEstado();
        $id_paci = $visita->get_id_paci();
        $id_doc = $visita->get_id_doc();
        $hora =$visita->getHora();
        $espe =$visita->getEspe();
        echo $sql="update visitas set fecha = '$fecha', estado= $estado , hora = '$hora', id_especialidad = '$espe' where id_paciente = $id_paci and id_doctor = $id_doc";
        $res= mysqli_query(conectar(), $sql)
        or die ("Error en la consulta $sql".mysqli_error(conectar()));
        echo "<script type='text/javascript'>
        alert('La visita se Edito Correctamente');
        </script>";
    }
    public function SetEstado(Visita $visita ){  //funciona jeje
        $id = $visita->getId();
        $estado = $visita->getEstado();
        $sql="update visitas set  estado= $estado where id=$id";
        $res= mysqli_query(conectar(), $sql)
        or die ("Error en la consulta $sql".mysqli_error(conectar()));
        echo "<script type='text/javascript'>
        alert('La visita se Edito Correctamente');
        </script>";
    }

    public function get_visita(Visita $visita){ //funciona mas o menos jeje
        $id= $visita->getId();
        $sql1="select * from visitas where id_paciente = $id";
        $res1=mysqli_query(conectar(),$sql1);
        while($row1=mysqli_fetch_assoc($res1)){
          //recorre la tabla cursos almacenando los datos en el vector creado cursos[]
        $this->cursos[]=$row1;

    } 
   return $this->cursos;
    }

    public function new_visita(Visita $visita){ //funciona jeje
        $fecha =$visita->getFecha();
        $estado = $visita->getEstado();
        $id_paci = $visita->get_id_paci();
        $id_doc = $visita->get_id_doc();
        $id_espe = $visita->getEspe();
        $hora = $visita->getHora();
        $sql="INSERT INTO visitas (id_paciente, id_doctor, estado, fecha, id_especialidad, hora) values ($id_paci, $id_doc, $estado, '$fecha','$id_espe', '$hora')";
        $res=mysqli_query(conectar(),$sql)
        or die ("Error en la consulta $sql".mysqli_error(conectar()));
        echo "<script type='text/javascript'>
        alert('La visita se agendo  Correctamente');
        </script>";
    }

    public function elim_visita(Visita $visita){ //funciona jeje
        $id = $visita->getId();
        $sql="delete from visitas where id=$id";
        $res=mysqli_query(conectar(),$sql)
        or die ("Error en la consulta $sql".mysqli_error(conectar()));
        echo "<script type='text/javascript'>
        alert('La visita se Canceló Correctamente');
        </script>";
    }

    public function get_visitafecha(Visita $visita){ //funciona mas o menos jeje
        $cursos=array();
        $fecha= $visita->getFecha();
        $sql1="SELECT visitas.*, paciente.nombre as nombrepaci, medico.nombre as nombremedi from visitas INNER JOIN paciente ON visitas.id_paciente=paciente.id_doc inner join medico on visitas.id_doctor=medico.id_doc where visitas.fecha='$fecha'";
        $res1=mysqli_query(conectar(),$sql1);
        while($row1=mysqli_fetch_assoc($res1)){
          //recorre la tabla cursos almacenando los datos en el vector creado cursos[]
        $cursos[]=$row1;
    } if($cursos == null){
        return false;
        }else{
        return $cursos;
        }
    }
    public function get_visitaDoc(Visita $visita){ //funciona mas o menos jeje
        $visitas=array();
        $id= $visita->get_id_doc();
        $sql1="SELECT visitas.*, paciente.nombre as nombrepaci, medico.nombre as nombremedi from visitas INNER JOIN paciente ON visitas.id_paciente=paciente.id_doc inner join medico on visitas.id_doctor=medico.id_doc where visitas.id_doctor='$id'";
        $res1=mysqli_query(conectar(),$sql1);
        while($row1=mysqli_fetch_assoc($res1)){
          //recorre la tabla cursos almacenando los datos en el vector creado cursos[]
        $visitas[]=$row1;
    } if($visitas == null){
        return false;
        }else{
        return $visitas;
        }
    }
    public function get_DocEsp(Visita $visita){ //funciona mas o menos jeje
        $cursos=array();
        $id= $visita->get_id_doc();
        $sql1="SELECT visitas.*, paciente.nombre as nombrepaci, medico.nombre as nombremedi, especialidad.espe from visitas INNER JOIN paciente ON visitas.id_paciente=paciente.id_doc inner join medico on visitas.id_doctor=medico.id_doc inner join especialidad on visitas.id_especialidad=especialidad.id where visitas.id_doctor='$id' and visitas.estado='0'";
        $res1=mysqli_query(conectar(),$sql1);
        while($row1=mysqli_fetch_assoc($res1)){
          //recorre la tabla cursos almacenando los datos en el vector creado cursos[]
        $cursos[]=$row1;
    } if($cursos == null){
        return false;
        }else{
        return $cursos;
        }
    }
    public function get_visitaPaci(Visita $visita){ //funciona mas o menos jeje
        $cursos=array();
        $id= $visita->get_id_paci();
        $sql1="SELECT visitas.*, paciente.nombre as nombrepaci, medico.nombre as nombremedi from visitas INNER JOIN paciente ON visitas.id_paciente=paciente.id_doc inner join medico on visitas.id_doctor=medico.id_doc where visitas.id_paciente='$id'";
        $res1=mysqli_query(conectar(),$sql1);
        while($row1=mysqli_fetch_assoc($res1)){
          //recorre la tabla cursos almacenando los datos en el vector creado cursos[]
        $cursos[]=$row1;
    } if($cursos == null){
        return false;
        }else{
        return $cursos;
        }
    }
    public function get_visitaPaciEsp(Visita $visita){ //funciona mas o menos jeje
        $cursos=array();
        $id= $visita->get_id_paci();
        $sql1="SELECT visitas.*, paciente.nombre as nombrepaci, medico.nombre as nombremedi, especialidad.espe from visitas INNER JOIN paciente ON visitas.id_paciente=paciente.id_doc inner join medico on visitas.id_doctor=medico.id_doc inner join especialidad on visitas.id_especialidad=especialidad.id where visitas.id_paciente='$id'";
        $res1=mysqli_query(conectar(),$sql1);
        while($row1=mysqli_fetch_assoc($res1)){
          //recorre la tabla cursos almacenando los datos en el vector creado cursos[]
        $cursos[]=$row1;
    } if($cursos == null){
        return false;
        }else{
        return $cursos;
        }
    }
    public function get_visitaTodo(){ //funciona mas o menos jeje
        $cursos=array();
        $sql1="SELECT visitas.*, paciente.nombre as nombrepaci, medico.nombre as nombremedi from visitas INNER JOIN paciente ON visitas.id_paciente=paciente.id_doc inner join medico on visitas.id_doctor=medico.id_doc ";
        $res1=mysqli_query(conectar(),$sql1);
        while($row1=mysqli_fetch_assoc($res1)){
          //recorre la tabla cursos almacenando los datos en el vector creado cursos[]
        $cursos[]=$row1;
    } if($cursos == null){
        return false;
        }else{
        return $cursos;
        }
    }

}

?>