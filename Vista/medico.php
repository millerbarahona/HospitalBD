<?php
if(isset($sesion)){



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido <?php echo $_SESSION['nombre']; ?></title>
    <!--Estilos-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../Vista/CSS/paciente.css"> 
    <link rel ="stylesheet" type ="text/css" href="../Vista/CSS/Admin.css">
    <script src="../Vista/Js/admin.js"></script>
</head>
<body class="home">
    <!-- barra navegacion -->
    <!--  -->
    
    <nav id="nav">
        <div class="container-fluid">
            <div class=row>
                <div class="col-lg-2">
                    <a href="">
                        <img src="../Vista/images/logo_hospital.png" alt="LogoHospital">   
                    </a>               
                </div>


                <!-- links -->
                <div class="col-lg-10">
                    <ul>
                   

                        
                        <li class="dropdown">
                                        <a href="#" class="btn btn-succes dropdown-toggle" data-toggle="dropdown"><img src="../Vista/images/perfil.png" alt="user">
                                            <b class="caret"></b></a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuBoton">
                                            <li>
                                                <div class="navbar-content">
                                                    <span align="center"><?php echo $_SESSION['nombre']; ?></span>
                                                    <p align="center" >
                                                        <?php echo $_SESSION['correo']; ?>
                                                    </p>
                                                    <div class="divider">
                                                    </div>
                                                    <a href="../Vista/UserMedico.php" target="Frame" id="pp2" class="view btn-sm active"><img src="../Vista/images/perfil1.png"></a> Ver Perfil
                                                    <div class="divider">
                                                    </div>
                                                    <a href="../Vista/EditMedico.php" target="Frame" id="pp2" class="view btn-sm active"> <img src="../Vista/images/editar (3).png"></a>  Editar Perfil
                                                    <div class="divider">
                                                    </div>
                                                     <a href="../Vista/index.php?ok=cerrar" class="view btn-sm active" ><img src="../Vista/images/cerrar.png"></a> Cerrar Sesión
                                
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                    </ul>
                </div>
                <!--  Nav dashboard -->
            
            </div>
         </div>

</nav>

         <!-- final barra -->
    <!-- Barra dashboard -->
    <div id="hola">
    <div class="container-fluid display-table top-400" >
        <div class="row display-table-row">
        
        <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">

            <div class="navi">
                    <ul>
                    
                        <li><a href="../Vista/verCitaMed.php" target="Frame" id="pp2"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Citas Agendadas </span></a></li>                        
                        <li><a href="../Vista/aceptarcita.php" target= "Frame" id="pp2"><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Cancelar Citas </span></a></li>
                        <li><a href="../Vista/VHClinico.php" target="Frame" id="pp2"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm"> Ver Citas Paciente</span></a></li>
                        <li><a href="../Vista/VHCliniRegi.php" target="Frame" id="pp2"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Generar Historial Clinico </span></a></li>
                      
                       
                       
                    </ul>
             </div>
         </div>
          
         
       

         <div class="col-md-10 col-sm-11 display-table-cell v-align">
         <div  class="user-dashboard" style="height: 88vh;">
                    <iframe name="Frame" style="height: 100%;width: 100%;border: 2px"></iframe>
       </div>
       </div>
       </div>
       </div>
</body>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="../assets/SweetAlert/dist/sweetalert2.all.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</html> 
<?php
}else{
    header('location: ../Vista/index.php');
}

?>