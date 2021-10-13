<?php
include_once('../Modelo/medico.php');
include_once('../ModeloDAO/medicoDAO.php');

$medico = new Medico();
$mDao = new Medico_DAO();
if (isset($_GET['medico'])) {
    echo "entro";
    $medico->setId($_GET['medico']);
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
                <h1>Agregar Medico</h1>
            </div>
        </div>
        <div class="row">
            <div class="card col-sm-12">
                <div class="card-body">
                    <h2>Medico</h2>
                    <form action="#" method="POST">
                        <div class="form-group">
                            <label class="inp" for="txt_nombre1">Numero de Documento</label>
                            <input type="number" class="form-control" name="txt_Documento" required placeholder="1008307..">
                        </div>
                        <div class="form-group">
                            <label class="inp" for="txt_apellido1">Correo</label>
                            <input type="email" class="form-control" name="txt_Correo" required placeholder="Correo@gmail.com">
                        </div>
                        <div class="form-group">
                            <label class="inp" for="txt_clave">Nombre Completo</label>
                            <input type="text" class="form-control" name="txt_nombre" placeholder="Alejandra Rodriguez" required>
                        </div>
                        <div class="form-group">
                            <label class="inp" for="txt_clave">Numero Telefonico</label>
                            <input type="number" class="form-control" name="txt_Telefono" placeholder="323859478" required>
                        </div>

                </div>
                <div class="form-group">
                    <label class="inp" for="txt_clave">Direccion</label>
                    <input type="text" class="form-control" name="txt_Dirrecion" placeholder="Calle 49 H #13 Norte" required>
                </div>
                <div class="form-group">
                    <label class="inp" for="txt_clave">Clave</label>
                    <input type="password" class="form-control" name="txt_clave" required>
                </div>

                <input type="submit" class="btn btn-success" name="btnagregar" value="Agregar">
                </form>

            </div>
        </div>
        <div class="row">
            <div class="col-sm-14">
                <h1>Agregar Especilidades</h1>
            </div>
        </div>
        <br>

        <?php
        $especilidad = "";
        $medico = new Medico();
        if (isset($_POST['btnagregar'])) {
            $documento = $_POST['txt_Documento'];
            $correo = $_POST['txt_Correo'];
            $nombre = $_POST['txt_nombre'];
            $telefono = $_POST['txt_Telefono'];
            $direccion = $_POST['txt_Dirrecion'];
            $clave = $_POST['txt_clave'];
            $medico->__constructor($nombre, $correo, $clave, 1, $documento, $especilidad, $direccion, $telefono);
            $medico->setId($documento);
            $medico->setName($nombre);
            $mDao->insert_medico($medico);
        }


        if ($medico->getId() != null || isset($_GET['medico'])) {
            if (isset($_GET['medico'])) {
                $medico->setId($_GET['medico']);
            }
            echo '<div class="row">
            <div class="card col-sm-12">
                <div class="card-body">
                    <h2>Especilidad Medico</h2>
                    <form action="../Vista/AgregarMedico.php" method="POST">
                        <div class="form-group">
                        <input id="prodId" name="prodId" type="hidden" value="' . $medico->getId() . '">
                            <input type="number" class="form-control" name="numero" placeholder="numero de especilidades del medico" require="true">
                        </div>
                        <input type="submit" class="btn btn-success" name="enviar" value="Enviar">';
        }
        if (isset($_POST['enviar'])) {
            $medico->setId($_POST['prodId']);
            if ($_POST['numero'] > 0 &&  $_POST['numero'] <= 10) {
                $cal = $_POST['numero'];
                echo " <br> <div class='row'>
                            <div class='card col-sm-12'>
                                <div class='card-body'>
                <form action='#' method='POST'>";
                for ($i = 1; $i <= $cal; $i++) {
                    echo '<div class="form-group">
                    <label class="inp" for="txt_clave">elija la especilidad ' . $i . ' del medico </label>
                    <select name="especilidad[]">
                    <option value="Cardiologo">Cardiologo</option>
                    <option value="Neurourologo">Neurourologo</option>
                    <option value="Hematologia">Hematologia</option>
                    <option value="General">General</option>
                    <option value="Ginegología y Obstetricia">Ginegología y Obstetricia</option>
                    <option value="Anatomía Patológica">Anatomía Patológica</option>
                    <option value="Anestesiología">Anestesiología</option>
                    <option value="Cirugía General">Cirugía General</option>
                    <option value="Dermatología">Dermatología</option>
                    <option value="Infectología">Infectología</option>
                </select>
                </div>';
                }
                echo " </div>
                <div class='form-group' >
                <input id='prodId' name='prodId' type='hidden' value='" . $medico->getId() . "'>
                <input type='submit' value='Aceptar'  name='btnEspecilidad'class='btn btn-success btn-block'>
                </div>
                 <div class='pt-4'>
                 
                </form>
                </div></div>";
            } else {
                $medico->setId($_POST['prodId']);
                echo "<script  type='text/javascript'>
                            alert('El numero digitado no es valido');
                            window.location='../Vista/AgregarMedico.php?medico=" . $medico->getId() . "'
                            </script>";
            }
        }

        echo  '</div>
            </div>
        </div>';
        if (isset($_REQUEST['btnEspecilidad'])) {
            $medico->setId($_POST['prodId']);
            $especilidadV = $_REQUEST['especilidad'];
            for ($i = 0; $i < count($especilidadV); $i++) {
                $medico->setEspecialidad($especilidadV[$i]);
                $mDao->insert_especilidad($medico) ;
            }
            header('location: ../Vista/MedicosListar.php');
        }
        ?>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>