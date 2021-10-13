<?php
include('../ModeloDAO/visitasCRUD.php');
include('../ModeloDAO/pacienteDAO.php');
include('../ModeloDAO/medicoDAO.php');
include_once ('../Modelo/Sesion.php');
$sesion = new UsserSession();
$correo=$sesion->getCurrentCorreo();
$medi = new Medico();
$medi->setEmail($correo);
$dao1 = new Medico_Dao;
$medi= $dao1->medico_correo($correo);
$id=$medi->getId();
$dao = new Visitas();

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
        
                <?php
                $visita = new Visita();
                $visita->set_id_doc($id);
                $row=$dao->get_DocEsp($visita);
                if($row==false){
                    echo "<script>alert('No hay visitas agendas para $id')</script> ";
                }else{
                echo"<table class='table' id='tabla'>
                    <thead class='thead-dark'>
                    <th scope='col'>Id </th>
                    <th scope='col'>Id Paciente</th>
                    <th scope='col'>Nombre Paciente</th>
                    <th scope='col'>Id Doctor</th>
                    <th scope='col'>Nombre Doctor</th>
                    <th scope='col'>Especialidad</th>
                    <th scope='col'>Fecha</th>
                    <th scope='col'>Hora</th>
                    <th scope='col'>Estado</th>
                    </thead>
                    <tbody>";
                    for($i=0;$i<count($row);$i++){
                        echo "<tr>";
                        echo "<td val>" .$row[$i]['id'] . "</td>";
                        echo "<td>" .$row[$i]['id_paciente'] . "</td>";
                        echo "<td>" .$row[$i]['nombrepaci']. "</td>";
                        echo "<td>" .$row[$i]['id_doctor'] . "</td>";
                        echo "<td>" .$row[$i]['nombremedi']. "</td>";
                        echo "<td>" .$row[$i]['espe']. "</td>";
                        echo "<td>" .$row[$i]['fecha'] . "</td>";
                        echo "<td>" .$row[$i]['hora'] . "</td>";
                        switch($row[$i]['estado']){
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
                        
                    echo "</tr>";
                        echo "</tr>";

                    }
                    echo "</tbody>
                    </table>";
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