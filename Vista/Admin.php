<?php
if(isset($sesion)){



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <script src="../Vista/Js/admin.js"></script>
    <title>Document</title>
</head>
<link href="../Vista/CSS/Admin.css" rel="stylesheet" crossorigin="anonymous">

<body class="home">
    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">
                <div class="logo">
                    <a hef="home.html"><img src="../Vista/images/logo_hospital_blanco.png" alt="Rana amarilla" class="hidden-xs hidden-sm">
                        <img src="../Vista/images/logo_hospital.png" alt="Rana amarilla" class="visible-xs visible-sm circle-logo">
                    </a>
                </div>
                <div class="navi">
                    <ul>
                        <li class="active"><a href="#"><i class="fa fa-home" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Home</span></a></li>
                        <li><a href="../Vista/ConsultarPanciente.php" target="Frame" id="pp2"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Pacientes</span></a></li>
                        <li><a href="../Vista/MedicosListar.php" target="Frame" id="pp2"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Medicos</span></a></li>
                        <li><a href="../Vista/buscarVisita.php" target="Frame" id="pp2" ><i class="fa fa-user" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Consultas</span></a></li>
                        <li><a href="../Vista/UserAdmin.php" target="Frame" id="pp2"><i class="fa fa-calendar" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Users</span></a></li>
                        <li><a href="../Vista/EditAmd.php" target="Frame" id="pp2"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Setting</span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-10 col-sm-11 display-table-cell v-align">
                <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
                <div class="row">
                    <header>
                        <div class="col-md-7">
                            <nav class="navbar-default pull-left">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar">sed</span>
                                        <span class="icon-bar">sds</span>
                                        <span class="icon-bar">sd</span>
                                    </button>
                                </div>
                            </nav>
                            <div class="search hidden-xs hidden-sm">
                                <input  hidden type="text" placeholder="Search" id="search">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="header-rightside">
                                <ul class="list-inline header-top pull-right">
                                    <li hidden class="hidden-xs"></li>
                                    <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                    <li>
                                        <a href="#" class="icon-info">
                                            <i class="fa fa-bell" aria-hidden="true"></i>
                                            <span class="label label-primary">3</span>
                                        </a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="btn btn-succes dropdown-toggle" data-toggle="dropdown"><img src="https://www.pngitem.com/pimgs/m/78-786420_icono-usuario-joven-transparent-user-png-png-download.png" alt="user">
                                            <b class="caret"></b></a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuBoton">
                                            <li>
                                                <div class="navbar-content">
                                                    <span><?php echo $sesion->getCurrentNombre(); ?></span>
                                                    <p class="text-muted small">
                                                        <?php echo $sesion->getCurrentCorreo(); ?>
                                                    </p>
                                                    <div class="divider">
                                                    </div>
                                                    <a href="../Vista/index.php?ok=cerrar" class="view btn-sm active">Cerrar sesion</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </header>
                </div>
                
                <div class="user-dashboard" style="height: 88vh;">
                    <iframe name="Frame" style="height: 100%;width: 100%;border: 2px"></iframe>
                </div>
            </div>
        </div>

    </div>
</body>

</html>

<?php
}else{
    header('location: ../Vista/index.php');
}

?>