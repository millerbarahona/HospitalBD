<?php
include_once('../Modelo/medico.php');
include_once('../ModeloDAO/medicoDAO.php');

$medico = new Medico();
$mDao = new Medico_DAO();

if(isset($_GET['id'])){
    $medico->setId($_GET['id']);
    $mDao->medico($medico);
    
}
if (isset($_POST['btnagregar'])) {
    $medico->setEmail( $_POST['txt_Correo']);
    $medico->setName($_POST['txt_nombre']);
    $medico->setTelefono($_POST['txt_Telefono']);
    $medico->setDireccion($_POST['txt_Dirrecion']);
    $medico->setId($_POST['txt_Documento']);
    $medico->setName($_POST['txt_nombre']);
    $medico1= new Medico();
    $medico1= $mDao->Login_medico($medico);
    $medico->setPassword($medico1->getPassword());
    if($_POST['txt_clave']!=null){
        echo "entro";
        $medico->setPassword($_POST['txt_clave']);
    }
    $mDao->update_medico($medico);
    header('location: ../Vista/MedicosListar.php');
}
?>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Medico</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body onload="">
    <div class="container">
        <div class="row">
            <div class="col-sm-14">
                <h1>Editar Medico</h1>
            </div>
        </div>
        <div class="row">
            <div class="card col-sm-12">
                <div class="card-body">
                    <h2>Medico</h2>
                    <form action="#" method="POST">
                        <div class="form-group">
                            <label class="inp" for="txt_nombre1">Numero de Documento</label>
                            <input type="number" class="form-control" name="txt_Documento" value="<?php echo $medico->getId();?>" required placeholder="1008307..">
                        </div>
                        <div class="form-group">
                            <label class="inp" for="txt_apellido1">Correo</label>
                            <input type="email" class="form-control" name="txt_Correo" value="<?php echo $medico->getEmail();?>" required placeholder="Correo@gmail.com">
                        </div>
                        <div class="form-group">
                            <label class="inp" for="txt_clave">Nombre Completo</label>
                            <input type="text" class="form-control" name="txt_nombre" value="<?php echo $medico->getName();?>" placeholder="Alejandra Rodriguez" required>
                        </div>
                        <div class="form-group">
                            <label class="inp" for="txt_clave">Numero Telefonico</label>
                            <input type="number" class="form-control" name="txt_Telefono"  value="<?php echo $medico->getTelefono();?>"placeholder="323859478" required>
                        </div>

                </div>
                <div class="form-group">
                    <label class="inp" for="txt_clave">Direccion</label>
                    <input type="text" class="form-control" name="txt_Dirrecion" value="<?php echo $medico->getDireccion();?>" placeholder="Calle 49 H #13 Norte" required>
                </div>
                <div class="form-group">
                    <label class="inp" for="txt_clave">Clave</label>
                    <input type="password" class="form-control" name="txt_clave" >
                </div>

                <input type="submit" class="btn btn-success" name="btnagregar" value="Agregar">
                </form>

            </div>
        </div>
        <br>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>