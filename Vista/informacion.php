<?php
include_once("../ModeloDAO/pacienteDAO.php");
include_once ('../Modelo/Sesion.php');
$sesion = new UsserSession();
$correo=$sesion->getCurrentCorreo();
$paci = new Paciente();
$paci->setEmail($correo);
$dao = new Paciente_Dao;
$paciente= $dao->paciente_correo($correo);
$name=$paciente->getName();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>informacion</title>
    <link rel="stylesheet" type="text/css" href="../Vista/css/paciente.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> 
</head>
<body>
 
<div class="pad_200" id="container">
		<div class="container ">
		<div class="row">
			<div class="col ">
				<h1 class="center main-tittle  white_bg"><font color="white"><strong>Bienvenido <?php echo $name?></strong></font></h1>
				<br>
			</div>
			<div class="d-flex align-items-center">
				<div class="col-xl-6">
					<div>
						<img class="diamante" src="../Vista/images/2.jpg" alt="12345">
					</div>				
				</div>
				<div class="col-xl-6">
                    <div class="panel panel-default">
					<h3><strong>Tenga en cuenta las siguientes recomendaciones:</strong></h3>
					<p>
                        <ul class="list-group">                            
                            <li class="list-group-item">Si quiere agendar una cita debe esperar la aceptacion del medico receptor</li>
                            <li class="list-group-item">Solo atendemos en horarios de lunes a viernes de 8:00 am A 5:30 pm </li>
                            <li class="list-group-item">Si quiere cancelar cita debe mencionar el motivo por el cual se cancela la cita o sera suspendido</li>
                            <li class="list-group-item">No puede solicitar mas de una cita con una especialidad en la misma semana de lo contrario sera suspendido</li>
                        </ul>
					</p>
                    </div> 
					</div>
				</div>
			</div>
		</div>
	</div>



</body>
</html>