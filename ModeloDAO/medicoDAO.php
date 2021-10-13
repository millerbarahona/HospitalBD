<?php 

include_once("../Modelo/medico.php"); 

include_once("../ModeloDAO/conexion.php"); 

class Medico_DAO 
{

   private $medic; 

   public function __construct()
   {
       $this->medic= array(); 
   }



   public function insert_medico(Medico $medico)
   {
    $nombre = $medico->getName(); 
    $correo = $medico->getEmail(); 
    $clave = $medico->getPassword(); 
    $rol = 1; 
    $direccion = $medico->getDireccion(); 
    $telefono = $medico->getTelefono(); 
    $id = $medico->getId(); 
     $sql = "INSERT INTO login VALUES('$correo', '$clave', $rol)"; 
     $res = mysqli_query(conectar(), $sql )
        or die("Error al hacer la consulta $sql".mysqli_error(conectar())); 
    $sql = "INSERT INTO medico VALUES('$id', '$correo', '$nombre', '$telefono', '$direccion')";
    $res = mysqli_query(conectar(), $sql )
    or die("Error al hacer la consulta $sql".mysqli_error(conectar()));  

        echo "<script type= 'text/javascript'> 
               alert( 'Se ha ingresado correctamente'); 
               </script>"; 

   }

   public function insert_especilidad(Medico $medico){
       $id=$medico->getId();
       $especialidad=$medico->getEspecialidad();
       $sql = "INSERT INTO especialidad VALUES(null, $id, '$especialidad')";
       $res = mysqli_query(conectar(), $sql )
       or die("Error al hacer la consulta $sql".mysqli_error(conectar())); 
   }



   public function update_medico(Medico $medico)
   {
     $this->medic = null;
    $nombre = $medico->getName(); 
    $correo = $medico->getEmail(); 
    $clave = $medico->getPassword();
    $rol = 1; 
    $direccion = $medico->getDireccion(); 
    $telefono = $medico->getTelefono(); 
    $id= $medico->getId();
     $sql = "UPDATE login SET CLAVE='$clave',ROL=$rol WHERE id_correo ='$correo' ";
     $res = mysqli_query(conectar(), $sql)
     or die("Error en la consulta $sql" . mysqli_error(conectar()));
    $sql = "UPDATE medico SET nombre='$nombre', correo ='$correo',  telefono= '$telefono', direccion ='$direccion' where id_doc=$id"; 
    $res = mysqli_query(conectar(),$sql)
    or die("Error en la consulta $sql" . mysqli_error(conectar()));
    echo "<script type='text/javascript'>
    alert('se ha ingresado');
    </script>";
   }
   public function update_especilidad(Medico $medico, $especialidad2){
        $id=$medico->getId();
        $especialidad=$medico->getEspecialidad();
        $sql = "UPDATE especialidad SET espe='$especialidad2' WHERE id_doc =$id and espe='$especialidad' ";
        $res = mysqli_query(conectar(), $sql)
        or die("Error en la consulta $sql" . mysqli_error(conectar()));
        echo "<script type='text/javascript'>
        alert('se ha ingresado');
        </script>";

   }
    public function delete_medico (Medico $medico)
    {
    $correo= $medico->getEmail(); 
    $id_doc= $medico->getId();
    $sql = "DELETE FROM login where id_correo= '$correo'"; 
    $res = mysqli_query(conectar(), $sql)
    or die ("Error en la consulta $sql".mysqli_error(conectar())); 
  
     $sql = "DELETE FROM medico where id_doc= $id_doc"; 
     $res = mysqli_query(conectar(), $sql)
     or die ( "Error en la consulta $sql".mysqli_error(conectar())); 
     //elimina login y medico...
    }
   
     public function medico_email($correo)
     {
        
        $this->medic = null;
        $medico = new Medico (); 
        $this->medic = NULL; 
        $link =  conectar(); 
        $sql = "SELECT * FROM medico where correo ='$correo'"; 
        $res1= mysqli_query($link, $sql) 
        or die ("Error en la consulta $sql".mysqli_error(conectar())); 
        while($row = mysqli_fetch_assoc($res1)){
            $this->medic[]= $row; 
        }

        $medico ->setId($this->medic[0]['id_doc']); 
       
        $medico ->setEmail($correo); 
        $medico ->setName($this->medic[0]['nombre']); 
        $medico ->setTelefono($this->medic[0]['telefono']); 
        $medico ->setDireccion($this->medic[0]['direccion']); 
      
    
       return $medico; 
     }

   public function Login_medico(Medico $medico){
    $this->medic=null;
    $correo = $medico->getEmail(); 
  
    $link =  conectar(); 
     $sql = "SELECT * FROM login  where id_correo = '$correo'"; 
     $res1 = mysqli_query($link, $sql)
     or die ("Error en la consulta $sql".mysqli_error(conectar())); 
     while( $row = mysqli_fetch_assoc($res1)){
         $this->medic[]=$row; 
     }
     $medico->setEmail($this->medic[0]['id_correo']); 
     $medico->setPassword($this->medic[0]['clave']); 
     $medico->setRol($this->medic[0]['rol']); 
     return $medico; 
     
   }
   public function comprobarM($id)
   { 
     $sql = "SELECT * FROM medico WHERE id_doc = $id"; 
     $res1= mysqli_query(conectar(), $sql);
     $contador = false; 
     while($row= mysqli_fetch_assoc($res1)){
         $contador = true; 
     } 
     return $contador; 
   }
   public function medico(Medico $medico)
   {
    $id = $medico->getId(); 
     $sql = "SELECT * FROM medico WHERE id_doc = $id"; 
     $res1= mysqli_query(conectar(), $sql); 
     while($row= mysqli_fetch_assoc($res1)){
         $this->medic[]=$row; 
     }

     $medico ->setId($this->medic[0]['id_doc']);
     $medico ->setEmail($this->medic[0]['correo']); 
     $medico ->setName($this->medic[0]['nombre']); 
     $medico ->setTelefono($this->medic[0]['telefono']); 
     $medico ->setDireccion($this->medic[0]['direccion']);  
     return $medico; 
   }
   public function medicos()
    {
        $link = conectar();
        $sql = "SELECT *  FROM medico ";
        $res1 = mysqli_query($link, $sql);
        while($row1=mysqli_fetch_assoc($res1)){
            //recorre la tabla cursos almacenando los datos en el vector creado cursos[]
              $this->medic[]=$row1;
          
            }
        return $this->medic;
    }
    public function especialidades($id_doc)
    {
        $especialidades=null;
        $link = conectar();
        $sql = "SELECT *  FROM especialidad WHERE id_doc=$id_doc";
        $res1 = mysqli_query($link, $sql)
        or die ("Error en la consulta $sql".mysqli_error(conectar()));;
        while($row1=mysqli_fetch_assoc($res1)){
            //recorre la tabla cursos almacenando los datos en el vector creado cursos[]
              $especialidades.=$row1['espe'].",";
          
            }
         
        return $especialidades;
    }

    public function eliminar_especialidades($id_doc)
    {
       $link = conectar(); 
       $sql = "DELETE FROM especialidad WHERE id_doc=$id_doc"; 
       $res = mysqli_query($link, $sql) or die
      ("Error al hacer la consulta $sql".mysqli_error(conectar()));  
    }
    public function modificar_especialdiades($id_doc)
    {
        $medico = new Medico(); 
        $especialidad = $medico->getEspecialidad(); 
        $link =conectar() ;
        $sql = "UPDATE FROM especialidad set especialidad ='$especialidad' where id_doc= '$id_doc'"; 
        $res = mysqli_query($link, $sql) or die
        ("Error al hacer la consulta $sql".mysqli_error(conectar()));  
        echo "<script type='text/javascript'>
        alert('se ha ingresado');
        </script>";
    }
    public function ver_medico(Medico $medico){
        $paci= null;
        $id= $medico->getId();
        $link = conectar();
        $sql = "SELECT *  FROM medico WHERE id_doc =$id";
        $res1 = mysqli_query($link, $sql)
        or die ("Error en la consulta $sql".mysqli_error(conectar()));
        while($row1=mysqli_fetch_assoc($res1)){
            //recorre la tabla cursos almacenando los datos en el vector creado cursos[]
              $paci[]=$row1;
            }
            return $paci;
    }
    
    public function ver_medicoEspe( Medico $medico){
        $paci= null;
        $id= $medico->getId();
        $espe = $medico->getEspecialidad();
        $link = conectar();
        $sql = "SELECT * FROM medico inner join especialidad WHERE especialidad.id =$espe and medico.id_doc=$id";
        $res1 = mysqli_query($link, $sql)
        or die ("Error en la consulta $sql".mysqli_error(conectar()));
        while($row1=mysqli_fetch_assoc($res1)){
            //recorre la tabla cursos almacenando los datos en el vector creado cursos[]
              $paci[]=$row1;
            }
            return $paci;
    }

    public function medico_correo($correo){
      $this->objeto= null; 
      $medico= new Medico();
      $link = conectar();
      $sql = "SELECT * FROM medico where correo='$correo'";
      $res1 = mysqli_query($link, $sql);
      while($row1=mysqli_fetch_assoc($res1)){
          $this->objeto[]= $row1;
      } 
      $medico->setId($this->objeto[0]['id_doc']);
      $medico->setName($this->objeto[0]['nombre']);
      $medico->setEmail($correo);
      $medico->setTelefono($this->objeto[0]['telefono']); 
      $medico->setDireccion($this->objeto[0]['direccion']);

      return $medico;

  }
}
 







?>