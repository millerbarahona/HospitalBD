<?php
include_once ('../Modelo/Sesion.php');
include_once ('../Modelo/administrador.php');
include_once ('../ModeloDAO/AdministradorDAO.php');

$sesion = new UsserSession();

$correo=$sesion->getCurrentCorreo();
$admin = new administrador();
$admin1 = new administrador();
$admin1->setEmail($correo);
$adm_DAO= new Admin_Dao();

$admin=$adm_DAO->adminCoreo($correo);
$admin1 =$adm_DAO->Login($admin1);
$admin->setPassword($admin1->getPassword());
$admin->setRol($admin1->getRol());
if(isset($_POST['btnactulizar'])){
    
    $admin->setName($_REQUEST['txt_nombres']);
    $admin->setEdad($_REQUEST['txt_edad']);
    if($_REQUEST['txt_clave']!=null){
        $admin->setPassword($_REQUEST['txt_clave']);
    }
    $adm_DAO->actulizar($admin);
    $admin=$adm_DAO->adminCoreo($correo);
}

?>


<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Productos</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>
    <body onload="">
        <div class="container">
            <div class="row">
                <div class="col-sm-14">
                    <h1 >Administrador</h1>
                </div>
            </div>
            <div class="row">
                <div class="card col-sm-12">
                    <div class="card-body">
                        <h2 >Editar Administrador</h2>
                        <form action ="../Vista/EditAmd.php?recargar=yes" method="POST">
                            <div class="form-group">
                                <label class="inp" for="txt_nombre1">Nombre</label>
                                <input type="text" class="form-control" name="txt_nombres" required value="<?php echo $admin->getName(); ?>" placeholder="Paco">
                            </div>

                            <div class="form-group">
                                <label class="inp" for="txt_apellido1">Edad</label>
                                <input type="text" class="form-control" name="txt_edad" required value="<?php echo $admin->getEdad(); ?>" placeholder="Rodriguez">
                            </div>
                            <div class="form-group">
                                <label class="inp" for="txt_clave">Nueva clave</label>
                                <input type="password" class="form-control" name="txt_clave"  >
                            </div>
                            <input type="submit" class="btn btn-success" name="btnactulizar" value="Actulizar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
</html>


