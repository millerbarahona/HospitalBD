
<?php
include('../ModeloDAO/visitasCRUD.php');
include('../ModeloDAO/pacienteDAO.php');
include('../ModeloDAO/medicoDAO.php');
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
    <title>Buscar</title>
    <script>
    function mostrar(){
        combo =document.getElementById("selec").value;
        if(combo == "fecha"){
            document.getElementById("fecha").style.display="block"
            document.getElementById("doctor").style.display="none"
            document.getElementById("paciente").style.display="none"
            document.getElementById("tabla").style.display="none"
            document.getElementById("todos").style.display="none"
        }else if(combo == "paciente"){
            document.getElementById("doctor").style.display="none"
            document.getElementById("fecha").style.display="none"
            document.getElementById("paciente").style.display="block"
            document.getElementById("tabla").style.display="none"
            document.getElementById("todos").style.display="none"
        }else if(combo == "doctor"){
            document.getElementById("paciente").style.display="none"
            document.getElementById("doctor").style.display="block"
            document.getElementById("fecha").style.display="none"
            document.getElementById("tabla").style.display="none"
            document.getElementById("todos").style.display="none"
        } 
        else if(combo == "todos"){
            document.getElementById("todo").style.display="block"
            document.getElementById("paciente").style.display="none"
            document.getElementById("doctor").style.display="none"
            document.getElementById("fecha").style.display="none"
            document.getElementById("tabla").style.display="none"
            
            
        } 
    }    
    </script>
</head>

<body>


    <div class="container align-items-center pt-4">
        <div class=" container col-md-4 align-items-center">
        <div class="row justify-content-center" >
                <form action="#" method="POST">
                <div class="form-group">
                <label for="fecha">Tipo de busqueda</label>
                <select class="form-control" required  id="selec" onchange="mostrar()">
                    <option value="">Seleccione uno</option>
                    <option value="fecha">Por Fecha</option>
                    <option value="paciente">Por Paciente</option>
                    <option value="doctor">Por Doctor</option>
                    <option value="todos">Todos</option>
                </select>
                </div>
                </form>
        </div>
        <div class="row justify-content-center" style="display: none;" id="fecha">
            <form action="#" method="POST">
            <div class="form-group">
            <label for="fecha">Ingrese la fecha a buscar</label>
            <input type="date" name="fecha" id="fecha" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="submit" name="buscarfecha" id="buscarfecha" class="btn btn-success btn-block" value="Mostrar">
            </div>
            </form>
        </div>
        <div class="row justify-content-center" style="display: none;" id="doctor">
            <form action="#" method="POST">
            <div class="form-group">
            <label for="fecha">Ingrese el id del doctor</label>
            <input type="number" name="id_doc" id="id_doc" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="submit" name="buscardoc" id="buscardoc" class="btn btn-success btn-block" value="Mostrar">
            </div>
            </form>
        </div>
        <div class="row justify-content-center" style="display: none;" id="paciente">
            <form action="#" method="POST">
            <div class="form-group">
            <label for="fecha">Ingrese el id del paciente</label>
            <input type="number" name="id_paci" id="id_paci" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="submit" name="buscarpaci" id="buscarbtn" class="btn btn-success btn-block" value="Mostrar">
            </div>
            </form>
        </div>

        <div class="row justify-content-center" style="display: none;" id="todo">
            <form action="#" method="POST">
            
            <div class="form-group">
                <input type="submit" name="buscartodo" id="buscartodo" class="btn btn-success btn-block" value="Mostrar">
            </div>
            </form>
        </div>
        </div>
        <?php
            if(isset($_POST['buscarfecha'])){
                $fecha=$_POST['fecha'];
                $visita = new Visita();
                $visita->setFecha($fecha);
                $row=$dao->get_visitafecha($visita);
                if($row==false){
                    echo "<script>alert('No hay visitas agendas para $fecha')</script> ";
                }else{
                echo"<table class='table' id='tabla'>
                    <thead class='thead-dark'>
                    <th scope='col'>Id </th>
                    <th scope='col'>Id Paciente</th>
                    <th scope='col'>Nombre Paciente</th>
                    <th scope='col'>Id Doctor</th>
                    <th scope='col'>Nombre Doctor</th>
                    <th scope='col'>Fecha</th>
                    <th scope='col'>Hora</th>
                    <th scope='col'>Estado</th>
                    <th scope='col'>Acciones</th>
                    </thead>
                    <tbody>";
                    for($i=0;$i<count($row);$i++){
                        echo "<tr>";
                        echo "<td val>" .$row[$i]['id'] . "</td>";
                        echo "<td>" .$row[$i]['id_paciente'] . "</td>";
                        echo "<td>" .$row[$i]['nombrepaci']. "</td>";
                        echo "<td>" .$row[$i]['id_doctor'] . "</td>";
                        echo "<td>" .$row[$i]['nombremedi']. "</td>";
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
                        echo "<td><a href='../Vista/buscarVisita.php?id=".$row[$i]['id']."&accion=realizada'><button type='button'  class='btn btn-primary'><i class='fas fa-edit'></i></button></a>
                    <a href='../Vista/buscarVisita.php?id=".$row[$i]['id']."&accion=cancelada'><button type='button' class='btn btn-danger'><i class='far fa-calendar-times'></i></button></a></td>";
                    echo "</tr>";
                        echo "</tr>";
                        
                    }
                    echo "</tbody>
                    </table>";
                    }
            }
            else if(isset($_POST['buscardoc'])){
                $id=$_POST['id_doc'];
                $visita = new Visita();
                $visita->set_id_doc($id);
                $row=$dao->get_visitaDoc($visita);
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
                    <th scope='col'>Fecha</th>
                    <th scope='col'>Hora</th>
                    <th scope='col'>Estado</th>
                    <th scope='col'>Acciones</th>
                    </thead>
                    <tbody>";
                    for($i=0;$i<count($row);$i++){
                        echo "<tr>";
                        echo "<td val>" .$row[$i]['id'] . "</td>";
                        echo "<td>" .$row[$i]['id_paciente'] . "</td>";
                        echo "<td>" .$row[$i]['nombrepaci']. "</td>";
                        echo "<td>" .$row[$i]['id_doctor'] . "</td>";
                        echo "<td>" .$row[$i]['nombremedi']. "</td>";
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
                        echo "<td><a href='../Vista/buscarVisita.php?id=".$row[$i]['id']."&accion=realizada'><button type='button'  class='btn btn-primary'><i class='fas fa-edit'></i></button></a>
                    <a href='../Vista/buscarVisita.php?id=".$row[$i]['id']."&accion=cancelada'><button type='button' class='btn btn-danger'><i class='far fa-calendar-times'></i></button></a></td>";
                    echo "</tr>";
                        echo "</tr>";
                        
                    }
                    echo "</tbody>
                    </table>";
                    }
            }
            else if(isset($_POST['buscarpaci'])){
                $id=$_POST['id_paci'];
                $visita = new Visita();
                $visita->set_id_paci($id);
                $row=$dao->get_visitaPaci($visita);
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
                    <th scope='col'>Fecha</th>
                    <th scope='col'>Hora</th>
                    <th scope='col'>Estado</th>
                    <th scope='col'>Acciones</th>
                    </thead>
                    <tbody>";
                    for($i=0;$i<count($row);$i++){
                        echo "<tr>";
                        echo "<td val>" .$row[$i]['id'] . "</td>";
                        echo "<td>" .$row[$i]['id_paciente'] . "</td>";
                        echo "<td>" .$row[$i]['nombrepaci']. "</td>";
                        echo "<td>" .$row[$i]['id_doctor'] . "</td>";
                        echo "<td>" .$row[$i]['nombremedi']. "</td>";
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
                        echo "<td><a href='../Vista/buscarVisita.php?id=".$row[$i]['id']."&accion=realizada'><button type='button'  class='btn btn-primary'><i class='fas fa-edit'></i></button></a>
                    <a href='../Vista/buscarVisita.php?id=".$row[$i]['id']."&accion=cancelada'><button type='button' class='btn btn-danger'><i class='far fa-calendar-times'></i></button></a></td>";
                    echo "</tr>";
                        echo "</tr>";

                    }
                    echo "</tbody>
                    </table>";
                    }
            }
            else if(isset($_POST['buscartodo'])){
                $row=$dao->get_visitaTodo();
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
                    <th scope='col'>Fecha</th>
                    <th scope='col'>Hora</th>
                    <th scope='col'>Estado</th>
                    <th scope='col'>Acciones</th>
                    </thead>
                    <tbody>";
                    for($i=0;$i<count($row);$i++){
                        echo "<tr>";
                        echo "<td val>" .$row[$i]['id'] . "</td>";
                        echo "<td>" .$row[$i]['id_paciente'] . "</td>";
                        echo "<td>" .$row[$i]['nombrepaci']. "</td>";
                        echo "<td>" .$row[$i]['id_doctor'] . "</td>";
                        echo "<td>" .$row[$i]['nombremedi']. "</td>";
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
                        echo "<td><a href='../Vista/buscarVisita.php?id=".$row[$i]['id']."&accion=realizada'><button type='button'  class='btn btn-primary'><i class='fas fa-edit'></i></button></a>
                    <a href='../Vista/buscarVisita.php?id=".$row[$i]['id']."&accion=cancelada'><button type='button' class='btn btn-danger'><i class='far fa-calendar-times'></i></button></a></td>";
                    echo "</tr>";
                        echo "</tr>";

                    }
                    echo "</tbody>
                    </table>";
                    }
            }
            if(isset($_GET['id']) ){
                if(isset($_GET['accion'])){ 
                    $visita1 = new Visita();
                    if($_GET['accion']=="realizada"){ 
                        $visita1->setEstado(1);
                        $visita1->setId($_GET['id']);
                        $dao->SetEstado($visita1);
                        echo "<script>window.location='../Vista/buscarVisita.php'</script>";
                    }else{
                        $visita1->setEstado(2);
                        $visita1->setId($_GET['id']);
                        $dao->SetEstado($visita1);
                        echo "<script>window.location='../Vista/buscarVisita.php'</script>";
                    }
                }
            }
        ?>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="../assets/SweetAlert/dist/sweetalert2.all.min.js"></script>
</body>

</html>


