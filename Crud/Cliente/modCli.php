<?php 
require_once("../../conexion/conexion.php");
$id=$_REQUEST['id'];
$nombre = $_REQUEST['txtNombre'];
$ape = $_REQUEST['txtApellido'];
$dni = $_REQUEST['txtDni'];
$tel = $_REQUEST['txtTelefono'];
$dir = $_REQUEST['txtDir'];
$user = $_REQUEST['txtUser'];
$pass = $_REQUEST['txtContraseña'];


$sql = ("UPDATE usu_cliente SET 
	nombre_cli='" .$nombre. "',
	apellido_cli='" .$ape. "',
	dni_cli='" .$dni. "',
	telefono_cli='" .$tel. "',
	direccion_cli='" .$dir. "',
	usuario='" .$user. "',
	contra='" .$pass. "'

	 WHERE id_usu_cli='" .$id. "'");  
$resultado=mysqli_query($con,$sql);

if ($resultado) {
	echo "<script>window.location='../../Views/clientes.php'</script>";
}else{
	echo "<script>alert('Error al Modificar');window.location='../../Views/clientes.php'</script>";
}

?>