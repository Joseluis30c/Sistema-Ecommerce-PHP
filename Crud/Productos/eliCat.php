<?php 
require_once("../../conexion/conexion.php");
$id=$_REQUEST['id'];
$sql = "DELETE  FROM categoria WHERE id_categoria='$id'";  
$resultado=mysqli_query($con,$sql);

if ($resultado) {
	echo "<script>window.location='../../Views/categorias.php'</script>";
}else{
	echo "<script>alert('Error al Eliminar');window.location='../../Views/categorias.php'</script>";
}
?>