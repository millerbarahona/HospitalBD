<?php
include_once('../ModeloDAO/medicoDAO.php');
include_once ('../Modelo/Sesion.php');
include_once ('../Modelo/paciente.php');
include_once('../ModeloDAO/visitasCRUD.php');
include_once('../ModeloDAO/pacienteDAO.php');
include_once('../ModeloDAO/conexion.php');
$doc = new Medico_DAO();
$row1 = $doc->medicos();

$sesion = new UsserSession();
$correo=$sesion->getCurrentCorreo();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agendar Citas</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Vista/CSS/login.css">
    <script language="javascript" src="./Js/jquery-3.1.1.min.js"></script>
    <script language="javascript" src="./Js/ajaxCita.js"></script>
</head>

<body>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5  col-lg-4 login-section-wrapper">
                    <div class="brand-wrapper">
                        <img src="./images/logo_hospital.png" alt="logo" class="logo">
                    </div>
                    <div class="login-wrapper my-auto">
                        <h1 class="login-title">Agenda tu Cita</h1>
                        <form  action="#" name="Login" id="Login" method="POST">
                            <div class="form-group">
                                <label for="email">Doctor</label>
                                <select name="select" class="form-control" id="doc" required>
                                    <option selected value="0">Selecciona una opción</option>
                                    <?php
                                    for ($i = 0; $i < count($row1); $i++) {
                                        echo "<option value='" . $row1[$i]['id_doc'] . "'>" . $row1[$i]['nombre'] . "</option>";
                                        echo "1";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label for="espe">Especialidad</label>
                                <select name="espe" class="form-control" id="espe" required>
                                    <input type="text" id="core" name="core" hidden value="<?php echo $sesion->getCurrentCorreo(); ?>">
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label for="fecha">Dia</label>
                                <input type="date" name="fecha" id="fecha" class="form-control" required>
                            </div>
                            <div class="form-group mb-4" id="pp">
                                
                            </div>
                            <div class="form-group mb-4" id="cont_hora"> 
                            <label for="fecha">Hora</label>
                            <select name="hora" class="form-control" id="hora" required>
                                </select>
                            </div>
                            <div id="vali"></div>
                            <input name="btnlogin" id="cita" class="btn btn-block login-btn" type="submit" value="Agendar Cita">
                        </form>
                        
                    </div>
                    
                </div>
                <div class="col-md-7  col-lg-8 px-0 d-none d-sm-block">
                    <img src="../Vista/images/agendarCita.jpg" alt="login image" class="login-img">
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

if (isset($_POST['id_doc'])) {
    $id = $_POST['id_doc'];
    $sql = "SELECT * FROM especialidad WHERE id_doc=$id";
    $res = mysqli_query(conectar(), $sql)
        or die("Error en la consulta $sql" . mysqli_error(conectar()));
    $html = "<option disabled selected >Selecciona una opción</option>";
    while ($row = mysqli_fetch_assoc($res)) {
        $html = "<option value='" . $row['id'] . "'>" . $row['especialidad'] . "</option>";
    }
    echo $html;
}



if(isset($_POST['btnlogin'])){
        $correo = $_POST['core'];
        $paciente = new Paciente();
        $Dao = new Paciente_Dao();
        $visita = new Visita ();
        $visita1 = new Visitas(); //dao de visitas
        $paciente->setEmail($correo);       
        $paciente1 = $Dao->ver_paciente2($paciente);        
        $id_paci = $paciente1['id_doc'];
        $id_doc = $_POST['select'];
        $dia = $_POST['fecha'];
        $espe = $_POST['espe'];
        $hora = $_POST['hora'] . ":00";
        $sqlll= "SELECT * FROM visitas WHERE id_doctor=".$_POST['select']." AND fecha='".$_POST['fecha']."'";
        $exec= mysqli_query(conectar(), $sqlll)
            or die ("Error en la consulta $sqlll".mysqli_error(conectar()));
            $contador =0;
            while($row=mysqli_fetch_assoc($exec)){
                $contador++;
            }
        if($contador<10){
        $visita->set_id_paci($id_paci);
        $visita->set_id_doc($id_doc);
        $visita->setEstado(0);
        $visita->setFecha($dia);
        $visita->setEspe($espe);
        $visita->setHora($hora);
        $visita1->new_visita($visita);}
        else {
            echo"<script type='text/javascript'>
                Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'La agenda del medico para el dia ".$dia." se encuentra ocupada',})
                $('#fecha').val(0)
                </script>";
        }
}
?>
