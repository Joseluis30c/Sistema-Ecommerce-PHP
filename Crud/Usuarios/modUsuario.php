<?php 
require_once("../../conexion/conexion.php");

$id=$_REQUEST['id'];
$id_cat=$_REQUEST['txtRol'];
$nombre = $_REQUEST['txtNombre'];
$ape = $_REQUEST['txtApellido'];
$dni = $_REQUEST['txtDni'];
$tel = $_REQUEST['txtTelefono'];
$user = $_REQUEST['txtUser'];
$pass = $_REQUEST['txtContraseña'];
$est=$_REQUEST['Estado'];

$sql = ("UPDATE usu_empleado SET 
	nombre_emple='" .$nombre. "',
	apellido_emple='" .$ape. "',
	dni_emple='" .$dni. "',
	telefono_emple='" .$tel. "',
	usuario='" .$user. "',
	contra='" .$pass. "', 
	id_tipousu='" .$id_cat. "', 
	estado='" .$est. "' 
	WHERE id_usu_emple='" .$id. "'");  
$resultado=mysqli_query($con,$sql);

if ($resultado) {
	echo "<script>window.location='../../Views/usuarios.php'</script>";
}else{
	echo "<script>alert('Error al Modificar');window.location='../../Views/usuarios.php'</script>";
}

?>