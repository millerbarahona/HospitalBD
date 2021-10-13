<?php  

include_once("../ModeloDAO/conexion.php");
include_once("../Modelo/paciente.php");
  
class Paciente_Dao{
    private $objeto;
    public function __construct()
    {
        $this->objeto=array();
    }
    public function insertar (Paciente $paciente){
        $id = $paciente->getId();
        $nombre = $paciente->getName();
        $correo = $paciente->getEmail();
        $clave = $paciente->getPassword();
        $rol = 2;
        $edad = $paciente->getEdad();
        $telefono =$paciente->getTelefono();
        $sexo=$paciente->getSexo();
        $direccion=$paciente->getDireccion();
        $tipo_doc=$paciente->getTipo_documento();
        $rh=$paciente->getRh();
        $fechanacimiento=$paciente->getFecha_nacimiento();
        $link = conectar();
        $sql = "INSERT INTO login VALUES('$correo','$clave',$rol)";
        $res = mysqli_query($link, $sql)
            or die("Error en la consulta $sql" . mysqli_error($link));
        $sql = "INSERT INTO paciente VALUES($id,'$correo','$nombre',$edad,'$telefono','$sexo','$direccion','$tipo_doc','$rh','$fechanacimiento')";
        $res = mysqli_query($link, $sql)
            or die("Error en la consulta $sql" . mysqli_error($link));
        echo "<script type='text/javascript'>
        alert('Se ha registrado correctamente');
        </script>";
    }
    public function actulizar(Paciente $paciente){
        $id=$paciente->getId();
        $nombre = $paciente->getName();
        $correo = $paciente->getEmail();
        $clave = $paciente->getPassword();
        $rol = 1;
        $edad = $paciente->getEdad();
        $telefono =$paciente->getTelefono();
        $sexo=$paciente->getSexo();
        $direccion=$paciente->getDireccion();
        $tipo_doc=$paciente->getTipo_documento();
        $rh=$paciente->getRh();
        $fechanacimiento=$paciente->getFecha_nacimiento();
        $link = conectar();
        $sql = "UPDATE login SET CLAVE='$clave' WHERE id_correo ='$correo'";
        $res = mysqli_query($link, $sql)
            or die("Error en la consulta $sql" . mysqli_error($link));
        $sql = "UPDATE paciente SET nombre='$nombre', telefono='$telefono', direccion='$direccion', 
        tipo_doc='$tipo_doc'  WHERE id_doc=$id";
        $res = mysqli_query($link, $sql)
            or die("Error en la consulta $sql" . mysqli_error($link));
        echo "<script type='text/javascript'>
        alert('se ha editado correctamente');
        </script>";
    }
    public function Login(Paciente $paciente)
    {
        $this->objeto= null; 
         $correo=  $paciente->getEmail(); 
        $link = conectar();
        $sql = "SELECT *  FROM login WHERE id_correo ='$correo'";
        $res1 = mysqli_query($link, $sql);
        while($row1=mysqli_fetch_assoc($res1)){
            //recorre la tabla cursos almacenando los datos en el vector creado cursos[]
              $this->objeto[]=$row1;
      
          
            }
          $paciente->setEmail($this->objeto[0]['id_correo']);
          $paciente->setPassword($this->objeto[0]['clave']);
          $paciente->setRol($this->objeto[0]['rol']);
        return $paciente;
    }
    public function comprobarP($id){
        $link = conectar();      
       $sql = "SELECT *  FROM paciente WHERE id_doc =$id";
        $res1 = mysqli_query($link, $sql);
        $contador =false;
        while($row1=mysqli_fetch_assoc($res1)){
            //recorre la tabla cursos almacenando los datos en el vector creado cursos[]
              $this->objeto[]=$row1;
            $contador=true;
            }
            return $contador;
    }
    public function paciente(Paciente $admin)
    {
        $id= $admin->getId();
        $link = conectar();
        $correo = $admin->getEmail();      
       $sql = "SELECT *  FROM paciente WHERE id_doc =$id";
        //echo "sql".$sql;
        $res1 = mysqli_query($link, $sql);
        $contador =false;
        while($row1=mysqli_fetch_assoc($res1)){
            //recorre la tabla cursos almacenando los datos en el vector creado cursos[]
              $this->objeto[]=$row1;
            $contador=true;
          
            }
             if($contador){
                $admin->setId($this->objeto[0]['id_doc']);
                $admin->setName($this->objeto[0]['nombre']);
                $correo=$this->objeto[0]['correo'];
                $admin->setEmail($correo);
                $admin->setRh($this->objeto[0]['rh']);
                $admin->setSexo($this->objeto[0]['sexo']);
                $admin->setEdad($this->objeto[0]['edad']);
                $admin->setTelefono($this->objeto[0]['telefono']);
                $admin->setFecha_nacimiento($this->objeto[0]['fecha_na']);
                $admin->setTipo_documento($this->objeto[0]['tipo_doc']);
                $admin->setDireccion($this->objeto[0]['direccion']);
                //
                return $admin;
             }else{
                echo "<script type= 'text/javascript'>
                alert('EL Documento ingresado no se encuentra en la base de datos');
                </script>";
                return null;
                }
    }

    public function pacientes()
    {
        $link = conectar();
        $sql = "SELECT *  FROM paciente ";
        $res1 = mysqli_query($link, $sql);
        while($row1=mysqli_fetch_assoc($res1)){
            //recorre la tabla cursos almacenando los datos en el vector creado cursos[]
              $this->objeto[]=$row1;
      
          
            }
        return $this->objeto;
    }

    public function paciente_correo($correo){
        $this->objeto= null; 
        $paciente= new Paciente();
        $link = conectar();
        $sql = "SELECT * FROM paciente where correo='$correo'";
        $res1 = mysqli_query($link, $sql);
        while($row1=mysqli_fetch_assoc($res1)){
            $this->objeto[]= $row1;
        } 
        $paciente->setId($this->objeto[0]['id_doc']);
        $paciente->setName($this->objeto[0]['nombre']);
        $paciente->setEmail($correo);
        $paciente->setRh($this->objeto[0]['rh']);
        $paciente->setSexo($this->objeto[0]['sexo']);
        $paciente->setEdad($this->objeto[0]['edad']);
        $paciente->setTelefono($this->objeto[0]['telefono']);
        $paciente->setFecha_nacimiento($this->objeto[0]['fecha_na']);
        $paciente->setTipo_documento($this->objeto[0]['tipo_doc']);
        $paciente->setDireccion($this->objeto[0]['direccion']);

        return $paciente;

    }
    public function ver_paciente(Paciente $paciente){
        $paci= null;
        $id= $paciente->getId();
        $link = conectar();
        $sql = "SELECT *  FROM paciente WHERE id_doc =$id";
        //echo "sql".$sql;
        $res1 = mysqli_query($link, $sql);
        while($row1=mysqli_fetch_assoc($res1)){
            //recorre la tabla cursos almacenando los datos en el vector creado cursos[]
              $paci=$row1;
            }
            return $paci;
    }
    public function ver_paciente2(Paciente $paciente){
        $paci= null;
        $id= $paciente->getEmail();
        $link = conectar();
        $sql = "SELECT *  FROM paciente WHERE correo ='$id'";
        //echo "sql".$sql;
        $res1 = mysqli_query($link, $sql)
        or die ("Error en la consulta $sql".mysqli_error(conectar()));
        while($row1=mysqli_fetch_assoc($res1)){
            //recorre la tabla cursos almacenando los datos en el vector creado cursos[]
              $paci=$row1;
            }
            return $paci;
    }
    public function recuperarPass(Paciente $paci){
        $paciente = new Paciente();
        $correo=$paci->getEmail();
        $direccion=$paci->getDireccion();
        $link = conectar();
        $row =null;
        $sql = "SELECT *  FROM paciente WHERE correo ='$correo' and direccion='$direccion'";
        $res1 = mysqli_query($link, $sql)
        or die ("Error en la consulta $sql".mysqli_error(conectar()));
        while($row1=mysqli_fetch_assoc($res1)){
            //recorre la tabla cursos almacenando los datos en el vector creado cursos[]
              $row[]=$row1;
            }
            if($row==null){
                return null;
            }else{
            $paciente->setId($row[0]['id_doc']);
            $paciente->setName($row[0]['nombre']);
            $paciente->setEmail($correo);
            $paciente->setRh($row[0]['rh']);
            $paciente->setSexo($row[0]['sexo']);
            $paciente->setEdad($row[0]['edad']);
            $paciente->setTelefono($row[0]['telefono']);
            $paciente->setFecha_nacimiento($row[0]['fecha_na']);
            $paciente->setTipo_documento($row[0]['tipo_doc']);
            $paciente->setDireccion($row[0]['direccion']);
    
            return $paciente;
            }
            

    }

}

?>