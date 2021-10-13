<?php
include ("../ModeloDAO/pacienteDAO.php");
include ("../ModeloDAO/HClinicoDAO.php");
include ("../ModeloDAO/medicoDAO.php");
include_once ("../Modelo/HClinico.php");
include_once ("../Modelo/Sesion.php");

$sesion = new UsserSession();
$daoM = new Medico_DAO();
$medicov = new Medico();
$medicov=$daoM->medico_email($sesion->getCurrentCorreo());
if(isset($_POST['agregarHC'])){
  regitrarHC();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

<link rel="stylesheet" href="../Vista/CSS/HClinico.css" />
</head>

<body>
<div class="modal">
    <div class="modal__container">
      <div class="modal__featured">
        <button type="button" class="button--transparent button--close">
          <svg class="nc-icon glyph" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="32px" height="32px" viewBox="0 0 32 32">
            <g><path fill="#ffffff" d="M1.293,15.293L11,5.586L12.414,7l-8,8H31v2H4.414l8,8L11,26.414l-9.707-9.707 C0.902,16.316,0.902,15.684,1.293,15.293z"></path> </g></svg>
          <span class="visuallyhidden">Return to Product Page</span>
        </button>
        <img height="100%" width="100%" src="../Vista/images/VHCregis.jpg" class="modal__product" />
      </div>
      <div class="modal__content">
        <h2>Registrar Historial Clinico</h2>

        <form action="#" method="POST">
          <ul class="form-list">
            <li class="form-list__row">
              <label>N° Identificacion Paciente</label>
              <input class="form-control" type="number" name="numP" required />
            </li>
            <li class="form-list__row">
              <label>N° Identificacion Doctor</label>
              <input class="form-control" type="number" name="numD" value="<?php echo $medicov->getId()?>"required />
            </li>
            <li class="form-list__row">
              <label>especilidad</label>
              <select name="especilidad" id="">
              <?php especilidades($medicov->getId()); ?>
              </select>
            </li>
            <li class="form-list__row">
              <label>Descripcion</label>
              <input class="form-control" type="text" name="descrip" required />
            </li>
            <li class="form-list__row">
            <label>Fecha creacion</label>
            <input id="user" type="date" class="form-control" name="fecha" require >   
            </li>
            <li>
            <br> </br>
              <button type="submit" class="button" name="agregarHC">Registrar</button>
            </li>
          </ul>
        </form>
      </div> <!-- END: .modal__content -->
    </div> <!-- END: .modal__container -->
  </div> <!-- END: .modal -->
</body>
</html>

<?php
function regitrarHC(){
  $idP = $_POST['numP'];
  $daoP = new Paciente_Dao();
  $daoM = new Medico_DAO();
  $validar = $daoP->comprobarP($idP);
  if($validar){
    if($daoM->comprobarM($_POST['numD'])){
      $obj = new HClinico();
      $obj->setidPaciente($_POST['numP']);
      $obj->setidDoctor($_POST['numD']);
      $obj->setDescripcion($_POST['descrip']);
      $obj->setFecha($_POST['fecha']);
      $obj->setId_es($_POST['especilidad']);
      $objDaoHC = new HClinico_DAO();
      $objDaoHC->insertarHC($obj);
    }
    else{
      echo "<script type='text/javascript'>alert('El Doctor no existe en nuestra base de datos');</script>";
    }
  }
  else{
    echo "<script type='text/javascript'>alert('El Paciente no existe en nuestra base de datos');</script>";
  }
}

  function especilidades($id1){ 
  $id=$id1;
  $sql= "SELECT * FROM especialidad WHERE id_doc=$id";
  $res= mysqli_query(conectar(), $sql)
  or die ("Error en la consulta $sql".mysqli_error(conectar()));
  $html ="";
  while($row= mysqli_fetch_assoc($res)){
   $html .= "<option value='".$row['id']."'>".$row['espe']."</option>";
  }
  echo $html;
}
?>
