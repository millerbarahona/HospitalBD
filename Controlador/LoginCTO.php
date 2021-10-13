
<?php

include('../ModeloDAO/LoginDAO.php');
include_once ('../ModeloDAO/AdministradorDAO.php');
include_once ('../ModeloDAO/pacienteDAO.php');
include_once('../ModeloDAO/medicoDAO.php'); 

include('../Modelo/Sesion.php');

if(isset($_POST['btnlogin'])){
    $log = new Login();
    $clave=$_REQUEST['contraseña'];
    $correo=$_REQUEST['correo'];
    $usuario=$log->Login($clave,$correo);
    if($usuario==null){
        include('../Vista/login.php');
        echo "<script type='text/javascript'>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Las credenciales no son validas!',
        })</script>";
    }else if($usuario->getRol()==0){
        ///mostrar interfaz para ususario
        
        $admin = new administrador();
        $adm_DAO= new Admin_Dao();
        $admin=$adm_DAO->adminCoreo($correo);
        $sesion = new UsserSession();
        $sesion->setCurrentUser($admin->getEmail(), $admin->getName());
        include_once ('../Vista/Admin.php');
    }else if($usuario->getRol()==1){
        $medico = new medico(); 
        $medico_DAO = new Medico_DAO(); 
        $medico=$medico_DAO->medico_email($correo); 
        $sesion = new UsserSession();
        $sesion->setCurrentUser($medico->getEmail(), $medico->getName()); 
        $medico ->setEspecialidad($medico_DAO->especialidades($medico->getId())); 
        include_once ('../Vista/medico.php');
        
    }else if($usuario->getRol()==2){
        $paciente= new Paciente();
        $pac_DAO= new Paciente_Dao();
        //$paciente= $pac_DAO ->login($correo,$clave);
        $paciente = $pac_DAO ->paciente_correo($correo);
        $sesion = new UsserSession();
        $sesion->setCurrentUser($paciente->getEmail(), $paciente->getName());
        
        include_once ('../Vista/paciente.php');
    }
}
if(isset($_REQUEST['btnrecu'])){
    $paciente = new Paciente();
    $dao = new Paciente_Dao();
    $paciente->setEmail($_REQUEST['correo']);
    $paciente->setDireccion($_REQUEST['direccion']);
    $respuesta=$dao->recuperarPass($paciente);
    if($respuesta==null){
        include('../Vista/RecuContra.php');
        echo "<script type='text/javascript'>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'no coinciden los datos del ususario!',
        })</script>";
    }else{
        $sesion = new UsserSession();
        $sesion->setCurrentUser($respuesta->getEmail(),$respuesta->getName());
        
        include_once ('../Vista/paciente.php');
    }
}

 

?>