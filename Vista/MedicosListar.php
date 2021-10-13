<?php
include('../ModeloDAO/medicoDAO.php');

$dao = new Medico_DAO();
$vector = $dao->medicos();


if(isset($_GET['accion'])){
    $medico = new Medico();
    $medico->setId($_GET['id']);
    $medico->setEmail($_GET['correo']);
    $dao->eliminar_especialidades($medico->getId());
    $dao->delete_medico($medico);
    header('location: ../Vista/MedicosListar.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Medicos</title>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link href="../Vista/CSS/Tablas.css" rel="stylesheet" crossorigin="anonymous">
    </head>
    <body onload="">
        <div class="container">
            <div class="row">
                <div class="col-sm-14">
                    <h1 >Medicos</h1>
                </div>
            </div>
            <div class="row">
                <div class="card col-sm-12">
                    <div class="card-body">
                        <h2 >Lista de medicos</h2>
                        <table class="table table-striped custab">
                        <thead>
                        <?php if (count($vector)<10){ 
                           echo  '<a href="../Vista/AgregarMedico.php?accion=agregar target="Frame" id="pp2"" class="btn btn-primary btn-xs pull-right"><b>+</b>Agregar Medico</a>';
                        }?>
                            <tr>
                                <th>Numero de Documento</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>telefono</th>
                                <th>direccion</th>
                                <th>Especilidades </th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <?php

                        for ($i = 0; $i < count($vector); $i++) {
                            $especilidades = null;
                            echo "<tr>";
                            $especilidades = $dao->especialidades($vector[$i]['id_doc']);
                            $array=explode(",",$especilidades);
                            $numeroEs=count($array);
                            $numeroEs=$numeroEs - 1;
                            echo "<td>" . $vector[$i]['id_doc'] . "</td>";
                            echo "<td>" . $vector[$i]['nombre'] . "</td>";
                            echo "<td>" . $vector[$i]['correo'] . "</td>";
                            echo "<td>" . $vector[$i]['telefono'] . "</td>";
                            echo "<td>" . $vector[$i]['direccion'] . "</td>";
                            echo "<td>" . $especilidades . "</td>";
                            echo "<td class='text-center'><a class='btn btn-info btn-xs' href='../Vista/EditarMedico.php?id=".$vector[$i]['id_doc']."&enviar=".$numeroEs."'><span class='glyphicon glyphicon-edit'>
                            </span> Edit</a> <a href='../Vista/MedicosListar.php?accion=eliminar&id=".$vector[$i]['id_doc']."&correo=".$vector[$i]['correo']."' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-remove'></span> Del</a></td>
                    </tr>";
                        }
                        ?>
                    </table>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="user-dashboard" style="height: 88vh;">
                    <iframe name="Frame" style="height: 100%;width: 100%;border: 2px"></iframe>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        
    </body>
</html>
