<?php
class UsserSession{
    public function __construct(){
            session_start();
    }
    public function setCurrentUser($correo, $nombre){
        
        $_SESSION['correo']=$correo;
        $_SESSION['nombre']=$nombre;

    }
    public function getCurrentCorreo(){
        return $_SESSION['correo'];
    }
    public function getCurrentNombre(){
        return $_SESSION['nombre'];
    }
    public function closeSession(){
        session_unset();
        session_destroy();
    }
}

?>