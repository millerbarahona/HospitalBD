<?php
include_once ('../Modelo/Sesion.php');
include_once ('../Modelo/medico.php');
include_once ('../ModeloDAO/medicoDAO.php');

$sesion = new UsserSession();

$correo=$sesion->getCurrentCorreo();
$medico = new Medico();
$medico_DAO= new Medico_DAO();
$medico=$medico_DAO->medico_email($correo);
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Editar Medico</title>
</head>
<body>
<div class="container">
      <div class="row">
        <div class="col-ls-6 col-sm-8 col-ls-6 col-ls-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >

            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="https://image.flaticon.com/icons/png/512/9/9800.png" class="img-circle img-responsive"> </div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Perfil</td>
                        <td>Medico <?php $medico->getName(); ?></td>
                      </tr>
                      <tr>
                        <td>Nombre</td>
                        <td><?php echo $medico->getName(); ?></td>
                      </tr>
                         <tr>
                        <tr>
                        <td>Numero de Documento</td>
                        <td><?php echo $medico->getId(); ?></td>
                      </tr>
                      <tr>
                        <td>Direccion</td>
                        <td><?php echo $medico->getDireccion(); ?></td>
                      </tr>
                      <tr>
                        <td>Telefono</td>
                        <td><?php echo $medico->getTelefono(); ?></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><a href="mailto:<?php echo $medico->getEmail(); ?>"><?php echo $medico->getEmail(); ?></a></td>
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
</body>
</html>