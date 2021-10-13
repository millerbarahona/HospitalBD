<?php

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
    <link rel="stylesheet" href="../Vista/CSS/recu.css">
</head>

<body>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5  col-lg-4 login-section-wrapper">
                    <div class="brand-wrapper">
                        <img src="../Vista/images/logo_hospital.png" alt="logo" class="logo">
                    </div>
                    <div class="login-wrapper my-auto">
                        <h1 class="login-title">Recuperar Contraseña </h1>
                        <form action="../Controlador/LoginCTO.php" name="Login" id="Login" method="POST">
                            <div class="form-group">
                                <label for="email">Correo</label>
                                <input type="email" id="user" name="correo" class="form-control" placeholder="email@ejemplo.com" require>
                            </div>
                            <div class="form-group mb-4">
                                <label for="password">Direccion</label>
                                <input type="text" name="direccion" id="direcion" class="form-control" placeholder="Ingrese su contraseña" require>
                            </div>
                            <input name="btnrecu" id="recu" class="btn btn-block login-btn" type="submit" value="Recupera tu contraseña">
                        </form>
                    </div>
                </div>
                <div class="col-md-7  col-lg-8 px-0 d-none d-sm-block">
                    <img src="../Vista/images/recu.jpg" alt="login image" class="login-img">
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="../assets/SweetAlert/dist/sweetalert2.all.min.js"></script>
</body>

</html>
<?php
    
?>
