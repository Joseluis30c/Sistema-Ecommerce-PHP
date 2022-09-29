<?php 
require_once("../../conexion/conexion.php");
$id=$_GET['id'];

$eli="DELETE FROM productos WHERE id_producto='$id'";
$result=mysqli_query($con,$eli);

if ($result) {
	echo "<script>window.location='../../Views/productos.php'</script>";
}else{
	echo "<script>alert('Error al eliminar');window.location='../../Views/productos.php'</script>";
}
?>