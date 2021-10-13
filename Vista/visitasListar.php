<?php
include('../ModeloDAO/visitasCRUD.php');
include('../ModeloDAO/pacienteDAO.php');
include('../ModeloDAO/medicoDAO.php');
$dao = new Visitas();
$visitas = $dao->ver_visitas();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <title>Document</title>
</head>

<body>
    <div class="container p-4">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id Consulta</th>
                    <th scope="col">Id Paciente</th>
                    <th scope="col">Nombre Paciente</th>
                    <th scope="col">Id Doctor</th>
                    <th scope="col">Nombre Doctor</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $paciente = new Paciente();
                $ver = new Paciente_Dao();
                $doctor = new Medico();
                $ver1 = new Medico_DAO();
                for($i = 0; $i < count($visitas); $i++){
                    echo "<tr>";
                    $paciente->setId($visitas[$i]['id_paciente']);
                    $row=$ver->ver_paciente($paciente);
                    $doctor->setId($visitas[$i]['id_doctor']);
                    $row1=$ver1->ver_medico($doctor);
                    echo "<td val>" .$visitas[$i]['id'] . "</td>";
                    echo "<td>" .$visitas[$i]['id_paciente'] . "</td>";
                    echo "<td>" .$row['nombre']. "</td>";
                    echo "<td>" .$visitas[$i]['id_doctor'] . "</td>";
                    echo "<td>" .$row1[0]['nombre']. "</td>";
                    echo "<td>" .$visitas[$i]['fecha'] . "</td>";
                    echo "<td>" .$visitas[$i]['hora'] . "</td>";
                    switch($visitas[$i]['estado']){
                        case 0:
                            echo "<td> agendada </td>";
                            break;
                        case 1:
                            echo "<td> realizada </td>";
                            break;
                        case 2:
                            echo "<td> cancelada </td>";
                            break;
                    }
                    echo "<td><a href='../Vista/visitasListar.php?id=".$visitas[$i]['id']."&accion=realizada'><button type='button'  class='btn btn-primary'><i class='fas fa-edit'></i></button></a>
                    <a href='../Vista/visitasListar.php?id=".$visitas[$i]['id']."&accion=cancelada'><button type='button' class='btn btn-danger'><i class='far fa-calendar-times'></i></button></a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="../assets/SweetAlert/dist/sweetalert2.all.min.js"></script>
</body>

</html>

<?php

if(isset($_GET['id']) ){
    if(isset($_GET['accion'])){ 
        $visita1 = new Visita();
        if($_GET['accion']=="realizada"){ 
            $visita1->setEstado(1);
            $visita1->setId($_GET['id']);
            $dao->SetEstado($visita1);
            header('location: ../Vista/visitasListar.php');
        }else{
            $visita1->setEstado(2);
            $visita1->setId($_GET['id']);
            $dao->SetEstado($visita1);
            header('location: ../Vista/visitasListar.php');
        }
    }
}


?>