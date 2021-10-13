<?php
include_once('../ModeloDAO/pacienteDAO.php');
include_once('../ModeloDAO/LoginDAO.php');
$dao = new Paciente_Dao();
$login = new Login();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rana Amarilla</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Vista/CSS/login.css">
</head>

<body>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5  col-lg-5 login-section-wrapper">
                    <div class="brand-wrapper">
                        <a href="./index.php"><img src="../Vista/images/logo_hospital.png" alt="logo" class="logo"></a>
                    </div>
                    <h1 class="login-title">Ingresar</h1>
                    <div class="row">
                       
                        <div class="login-wrapper  col-md-6">
                            
                            <form action="#" name="Login" id="Login" method="POST">
                                <div class="form-group mb-4">
                                    <label for="user" class="label">Nombre Completo</label>
                                    <input id="nombre" type="text" class="form-control" name="nombre" required placeholder="Ingrese su Nombre">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="user" class="label">Email</label>
                                    <input id="email" type="email" class="form-control" name="correo" require placeholder="Ingrese su Email">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="user" class="label">Direccion</label>
                                    <input id="dire" type="text" class="form-control" name="direccion" required placeholder="Ingrese su Direccion">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="user" class="label">Fecha de Nacimiento</label>
                                    <input id="naci" type="date" class="form-control" name="fecha_nac" require > 
                                </div>
                                <div class="form-group mb-4">
                                    <label for="user" class="label">Tipo de Documento</label>
                                    <select  id="tip_doc" name="tipo_doc" class="form-control">
                                    <option value="Cedula" >Cedula</option>
                                    <option value="TI" >Tarjeta de Identidad</option>
                                    <option value="Cedula Extranjera">Cedula Extranjera</option>
                                </select>
                                </div>
                                
                        </div>
                        <div class="login-wrapper col-md-6">
                            <div class="form-group mb-4">
                                <label for="user" class="label">No Documento</label>
                                <input id="num_doc" type="number" class="form-control" name="num_docu" required placeholder="Ingrese su Contraseña">
                            </div>
                            <div class="form-group mb-4">
                                <label for="user" class="label" >RH</label>
                                <div class="row">
                                <select id="rh1" name="RH1" class="form-control col-md-6">
                                    <option value="B">A</option>
                                    <option value="B">B</option>
                                    <option value="O">O</option>
                                    <option value="AB">AB</option>
                                </select>
                                <select id="rh2" name="RH2" class="form-control col-md-6">
                                    <option value="+" >+</option>
                                    <option value="-" >-</option>
                                </select>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="user" class="label">Sexo</label>
                                <select id="sexo" name="sexo" class="form-control">
                                    <option value="Hombre" >Hombre</option>
                                    <option value="Mujer" >Mujer</option>
                                    <option value="Otro">Otro</option>
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label for="user" class="label">Telefono Celular</label>
                                <input id="cel" type="number" pattern="[0-9]{10}" pattern="[0-9]{7}" class="form-control" name="telefono" required placeholder="Ingrese su Celular">
                            </div>
                            <div class="form-group mb-4">
                                    <label for="user" class="label">Contraseña</label>
                                    <input id="contra" type="password" class="form-control" name="contra" required placeholder="Ingrese su Contraseña">
                            </div>
                        </div>
                        <div class="login-wrapper  col-md-12 center-block">
                            <input type="submit" class="btn btn-block login-btn" name="btnregis" id="btnregis" value="Registrarse">
                        </div>
                    </div>
                    </form>                            
                </div>
                <div class="col-md-7  col-lg-7 px-0 d-none d-sm-block">
                    <img src="../Vista/images/signup-bg.jpg" alt="login image" class="login-img">
                </div>
            </div>
        </div>

        <script> 
    $("#entidad").on("change", function(){
  if($("#start_date").val() =="")
     {
        alert("Fecha inicio vacía");
     }
     else
     {
     	if($("#end_date").val() ==""){
     	   alert("Fecha fin vacía");
     	}
        else
        {
           //Todo correcto
        }
        
     }    
})</script>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="../assets/SweetAlert/dist/sweetalert2.all.min.js"></script>
</body>

</html>


<?php

    if(isset($_POST['btnregis'])){
        $paci = new Paciente();
        $veri =true;
        $paci->setName($_POST['nombre']);
        $paci->setDireccion($_POST['direccion']);
        $paci->setEmail($_POST['correo']);
        $paci->setFecha_nacimiento($_POST['fecha_nac']);
        $paci->setTipo_documento($_POST['tipo_doc']);
        $paci->setId($_POST['num_docu']);
        $paci->setRh($_POST['RH1'].$_POST['RH2']);
        $paci->setSexo($_POST['sexo']);
        $paci->setTelefono($_POST['telefono']);
        $paci->setPassword($_POST['contra']);
        $paci->setEdad(calEdad($_POST['fecha_nac']));
        $row=$login->verLogin();
        for($i=0; $i<count($row);$i++){
            
            if($row[$i]['id_correo'] == $paci->getEmail()){
                $veri=false;
                break;  
            }
        }
        if($veri== false){
            echo "<script>alert('El correo que ingreso ya fue registrado')</script>";
            echo "<script>window.location='./login.php'</script>";
        }else{
            $dao->insertar($paci);
            echo "<script>window.location='./login.php'</script>";
    }
    }

    function calEdad ($fecha){
        $cumpleanos = new DateTime($fecha);
        $hoy = new DateTime();
        $annos = $hoy->diff($cumpleanos);
        return $annos->y;
    }


?>