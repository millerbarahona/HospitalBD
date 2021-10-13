<?php
include_once ('../Modelo/Sesion.php');
include_once ('../Modelo/paciente.php');
include_once ('../ModeloDAO/pacienteDAO.php');

$sesion = new UsserSession();

$correo=$sesion->getCurrentCorreo();
$paciente = new paciente();
$pac_DAO= new Paciente_Dao();
$paciente = $pac_DAO->paciente_correo($correo);
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href= "stylesheet" type="text/css" href="../Vista/CSS/user.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Document</title>
</head>
<body>
 <div id="table-400">
<div class="container">
      <div class="row">
        <div class="col-ls-6 col-sm-8 col-ls-6 col-ls-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >

            <div class="panel-body">
              <div class="row">
                <div class="col-md-2 col-lg-5" > <img alt="User Pic" src="https://image.flaticon.com/icons/png/512/9/9800.png" class="img-circle img-responsive"> </div>
                <div class=" col-md-10 col-lg-7"> 
                  <table class="table table-user-information">
                    <tbody>
                   
                      <tr>
                        <td>Nombre: </td>
                        <td><?php echo $paciente->getName(); ?></td>
                         
                      </tr>
                      <tr>
                        <td>Telefono: </td>
                        <td><?php echo $paciente->getTelefono(); ?></td>
                        
                     
                      </tr>
                      <tr>
                        <td>Fecha nacimiento: </td>
                        <td > <?php echo $paciente->getFecha_nacimiento();  ?></td>
                       
                      </tr>
                         <tr>
                        <tr>
                        <td>Edad: </td>
                        <td><?php echo $paciente->getEdad(); ?></td>
                         
                      </tr>
                      <tr>
                        <td>Sexo: </td>
                        <td><?php echo $paciente->getSexo();  ?></td>
                       
                      </tr>
                      <tr>
                        <td>RH: </td>
                        <td><?php echo $paciente->getRh();  ?></td>
                        
                      </tr>
                      <tr>
                        <td>Dirección: </td>
                        <td><?php echo $paciente->getDireccion();  ?></td>
                        
                      </tr>
                      <tr>
                        <td>Correo: </td>
                        <td><a href="mailto:<?php echo $paciente->getEmail(); ?>"><?php echo $paciente->getEmail(); ?></a></td>
                         
                      </tr>
                      
                     

                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
    </div>
</body>
</html>