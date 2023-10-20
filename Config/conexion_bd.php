<?php

$server="localhost";
$user="root";
$pass="";
$db="bd_ventas";

$conexion= new mysqli($server,$user,$pass,$db);
if ($conexion->connect_errno) {
    die ("Error de conexión a la base de datos: ".$conexion->connect_errno);
}
$conexion->set_charset("utf8");

?>