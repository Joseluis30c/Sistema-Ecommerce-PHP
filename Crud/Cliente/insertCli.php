<?php 
require_once("../../conexion/conexion.php");

$nombre=$_POST["txtNombre"];
$apellido=$_POST["txtApellido"];
$dni=$_POST["txtDni"];
$tel=$_POST["txtTelefono"];
$dir=$_POST["txtDir"];
$usua=$_POST["txtUser"];
$contra=$_POST["txtContraseña"];

$sql="INSERT INTO usu_cliente (nombre_cli, apellido_cli, dni_cli, telefono_cli, direccion_cli, usuario, contra) VALUES('$nombre','$apellido','$dni','$tel','$dir','$usua','$contra')";
$resultado=mysqli_query($con,$sql);
if ($resultado) {
	echo "<script>window.location='../../Views/clientes.php'</script>";
}else{
	echo "<script>alert('error');window.location='../../Views/clientes.php'</script>";
}
?>