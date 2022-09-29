<?php 
require_once("../../conexion/conexion.php");

$id=$_GET['id'];

$consulta="DELETE FROM usu_empleado WHERE id_usu_emple='$id'";
$resultado=mysqli_query($con,$consulta);

if ($resultado) {
	echo "<script>window.location='../../Views/usuarios.php'</script>";
}else{
	echo "<script>alert('Error al Eliminar');window.location='../../Views/usuarios.php'</script>";
}
?>