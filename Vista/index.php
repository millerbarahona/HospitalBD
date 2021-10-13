<?php
include_once('../Modelo/Sesion.php');
$sesion = new UsserSession();

if (isset($_GET['ok'])) {
    $sesion->closeSession();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <!-- bootstrap -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- Estilos -->
    <link rel="stylesheet" type="text/css" href="./CSS/index.css">
    <link rel="stylesheet" href="./CSS/slippry.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Scripts -->
    <!-- favicon -->
    <link rel="shortcut icon" href="./images/favicon.ico?v=2" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico?v=2" type="image/x-icon">


</head>

<body>

    <!-- barra navegacion -->
    <nav id="nav">
        <div class="container-fluid">
            <div class=row>
                <div class="col-lg-2">
                    <a href="">
                        <img src="./images/logo_hospital.png" alt="LogoHospital">
                    </a>
                </div>
                <!-- links -->
                <div class="col-lg-10">
                    <ul>
                        <li> <a href="index.php">Inicio</a></li>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="index.html#nosotros">Nosotros</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- final barra -->

    <!-- slippry -->
    <section id="slider">
        <ul id="slippry">
            <li>
                <h4 class="right top_250 white_bg">Tu salud es lo primero</h4>
                <p class="right top_300 white_bg">
                <h3 class="right top_300 white_bg">
                    Es por eso que te invitamos a que agendes tu cita con nosotros.<br>
                    ¡Te esperamos!
                </h3>
                </p>

                <a href="./Formulario_agenda.php"><button class="right top_375 black">Agendar cita</button></a>

                <img src="./images/5.jpg" alt="">
            </li>
            <li>
                <a href="#slide2"><img src="./images/3.jpg" alt=""></a>
            </li>
            <li>
                <a href="#slide3"><img src="./images/4.jpg" alt=""></a>
            </li>
        </ul>
    </section>
    <!-- final slipry -->

</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="./Js/slippry.min.js"></script>


<script>
    $(document).ready(function() {
        $("#slippry").slippry({
            captions: false,
            pager: false
        });
    });
</script>

</html>