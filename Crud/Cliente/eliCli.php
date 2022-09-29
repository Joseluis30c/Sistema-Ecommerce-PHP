<?php 
require_once("../../conexion/conexion.php");

$id=$_GET['id'];

$consulta="DELETE FROM usu_cliente WHERE id_usu_cli='$id'";
$resultado=mysqli_query($con,$consulta);

if ($resultado) {
	echo "<script>window.location='../../Views/clientes.php'</script>";
}else{
	echo "<script>alert('Error al Eliminar');window.location='../../Views/clientes.php'</script>";
}
?>