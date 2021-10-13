<?php

include_once ("conexion.php");
include_once ("../Modelo/administrador.php");

class Admin_Dao
{
    private $admin1;
    public function __construct()
    {
        $this->admin1=array();
    }

    public function insertar(administrador $admin)
    {
        $nombre = $admin->getName();
        $correo = $admin->getEmail();
        $clave = $admin->getPassword();
        $rol = 0;
        $edad = $admin->getEdad();
        $link = conectar();
        $sql = "INSERT INTO login VALUES('$correo','$clave',$rol)";
        $res = mysqli_query($link, $sql)
            or die("Error en la consulta $sql" . mysqli_error($link));
        $sql = "INSERT INTO administrador VALUES(null,'$correo','$nombre',$edad)";
        $res = mysqli_query($link, $sql)
            or die("Error en la consulta $sql" . mysqli_error($link));
        echo "<script type='text/javascript'>
        alert('se ha ingresado');
        </script>";
    }

    public function actulizar(administrador $admin)
    {
        $id = $admin->getId();
        $nombre = $admin->getName();
        $correo = $admin->getEmail();
        $clave = $admin->getPassword();
        $rol = 0;
        $edad = $admin->getEdad();
        $link = conectar();
        $link = conectar();
        $sql = "UPDATE login SET CLAVE='$clave',ROL=$rol WHERE id_correo ='$correo' ";
        $res = mysqli_query($link, $sql)
            or die("Error en la consulta $sql" . mysqli_error($link));
        $sql = "UPDATE  administrador SET nombre='$nombre', edad=$edad WHERE id_doc=$id";
        $res = mysqli_query($link, $sql)
            or die("Error en la consulta $sql" . mysqli_error($link));
        echo "<script type='text/javascript'>
        alert(' los datos se han ACTULIZADO');
        </script>";
    }

    public function Login(administrador $admin)
    {
        $this->admin1=null;
        //$id = $admin->getId();
        //$nombre = $admin->getName();
        $correo = $admin->getEmail();
        //$clave = $admin->getPassword();
        //$rol = 0;
        //$edad = $admin->getEdad();
        $link = conectar();
        $sql = "SELECT *  FROM login WHERE id_correo ='$correo' ";
        $res1 = mysqli_query($link, $sql);
        while($row1=mysqli_fetch_assoc($res1)){
            //recorre la tabla cursos almacenando los datos en el vector creado cursos[]
              $this->admin1[]=$row1;
      
          
            }
          $admin->setEmail($this->admin1[0]['id_correo']);
          $admin->setPassword($this->admin1[0]['clave']);
          $admin->setRol($this->admin1[0]['rol']);
        return $admin;
    }
    public function admin( $admin)
    {
        $id= $admin->getId();
        $link = conectar();
        $sql = "SELECT *  FROM administrador WHERE id_doc =$id";
        $res1 = mysqli_query($link, $sql);
        while($row1=mysqli_fetch_assoc($res1)){
            //recorre la tabla cursos almacenando los datos en el vector creado cursos[]
              $this->admin1[]=$row1;
      
          
            }
        $admin->setId($this->admin1[0]['id_doc']);
        $admin->setName($this->admin1[0]['nombre']);
          $correo=$this->admin1[0]['Correo'];
         // echo $correo;
          $admin->setEmail($correo);
          //echo "hola ".$admin->getEmail();
          $admin->setEdad($this->admin1[0]['edad']);
        return $admin;
    }
    public function adminCoreo( $correo)
    {
        $this->admin1=null;
        $admin =new administrador();
        $link = conectar();
        $sql = "SELECT *  FROM administrador WHERE correo ='$correo'";
        $res1 = mysqli_query($link, $sql);
        while($row1=mysqli_fetch_assoc($res1)){
            //recorre la tabla cursos almacenando los datos en el vector creado cursos[]
              $this->admin1[]=$row1;


            }
        $admin->setId($this->admin1[0]['id_doc']);
        $admin->setName($this->admin1[0]['nombre']);
          $correo=$this->admin1[0]['Correo'];
         // echo $correo;
          $admin->setEmail($correo);
          //echo "hola ".$admin->getEmail();
          $admin->setEdad($this->admin1[0]['edad']);
        return $admin;
    }

}

