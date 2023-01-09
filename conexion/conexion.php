<?php 
//variables
$servidor="localhost";
$usuario="root";
$clave="";
$db="tienda";

//crear conexion
$con=mysqli_connect($servidor,$usuario,$clave,$db);
if (!$con) {
	die("Error en la conexion..".mysql_connect_error());
}
?>