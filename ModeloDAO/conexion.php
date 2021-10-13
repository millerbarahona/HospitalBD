<?php
function conectar(){
$host="localhost";//el nombre del servidor de mysql
$user="root1";//usario de mysql
$pass="elperroesta0147";//password de mysql
$dbname="bd_hospital";//nombre de la base de datos
//conectarnos a la BD
$link=mysqli_connect($host,$user,$pass) 
  or die("ERROR al conectar la BD".mysqli_error($link));
  //seleccionar la BD
  mysqli_select_db($link,$dbname) 
  or die("ERROR al seleccionar la BD".mysqli_error($link));
return $link;
}


?>
