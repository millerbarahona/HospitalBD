<?php
include ('../ModeloDAO/pacienteDAO.php');

$dao = new Paciente_Dao();
$vector=$dao->pacientes();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="../Vista/CSS/Tablas.css" rel="stylesheet" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row col-md-12 col-xl-offset-2 custyle">
            <table class="table table-striped custab">
                <thead>
                    <tr>
                        <th>Documento</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>telefono</th>
                        <th>Edad</th>
                        <th>Sexo</th>
                        <th>direccion</th>
                        <th>Tipo de Documento</th>
                    </tr>
                </thead>
                <?php

                for($i=0;$i<count($vector); $i++){
                    echo "<tr>";
                    echo "<td>" .$vector[$i]['id_doc'] . "</td>";
                    echo "<td>" .$vector[$i]['nombre'] . "</td>";
                    echo "<td>" .$vector[$i]['correo'] . "</td>";
                    echo "<td>" . $vector[$i]['telefono'] . "</td>";
                    echo "<td>" . $vector[$i]['edad'] . "</td>";
                    echo "<td>" . $vector[$i]['sexo'] . "</td>";
                    echo "<td>" . $vector[$i]['direccion'] . "</td>";
                    echo "<td>" . $vector[$i]['tipo_doc'] . "</td>
                    </tr>";
                }
                ?>
            </table>
        </div>
    </div>

</body>

</html>