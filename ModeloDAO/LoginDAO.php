<?php
include_once("conexion.php");
include_once("../Modelo/administrador.php");
include_once("../Modelo/paciente.php");
include_once("../Modelo/medico.php");
class Login{
    private $objeto;
    public function __construct()
    {
        $this->objeto=array();
    }
    public function Login($clave ,$correo)
    {
        $link = conectar();
        $sql = "SELECT *  FROM login WHERE id_correo ='$correo' AND clave ='$clave'";
        $res1 = mysqli_query($link, $sql);
        while($row1=mysqli_fetch_assoc($res1)){
            //recorre la tabla cursos almacenando los datos en el vector creado cursos[]
              $this->objeto[]=$row1;
      
          
            }
        if(empty($this->objeto)==false){

          $correo=($this->objeto[0]['id_correo']);
          $clave =($this->objeto[0]['clave']);
          $rol =($this->objeto[0]['rol']);
            if($rol==0){
                $admin = new administrador();
                $admin->setEmail($correo);
                $admin->setPassword($clave);
                $admin->setRol($rol);
                return $admin;
            }else if($rol==2){ 
                $paciente = new Paciente();
                $paciente->setEmail($correo);
                $paciente->setPassword($clave);
                $paciente->setRol($rol);
                return $paciente;
            }else if($rol ==1){
                $medico = new Medico();
                $medico->setEmail($correo);
                $medico->setPassword($clave);
                $medico->setRol($rol);
                return $medico;
            }
        }else{
        return null;
        }
    }
    public function verLogin (){
        $link = conectar();
        $row = array();
        $sql ="SELECT * FROM login";
        $res1 = mysqli_query($link, $sql)
        or die ("Error en la consulta $sql".mysqli_error($link));
        while($row1=mysqli_fetch_assoc($res1)){
            //recorre la tabla cursos almacenando los datos en el vector creado cursos[]
              $row[]=$row1;
            }
            return $row;
    }
  
}

?>