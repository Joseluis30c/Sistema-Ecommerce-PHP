<?php 
require_once("../../conexion/conexion.php");
$id=$_REQUEST['id'];
$nombre = $_REQUEST['txtCat'];

$sql = ("UPDATE categoria SET nombre_cat='" .$nombre. "' WHERE id_categoria='" .$id. "'");  
$resultado=mysqli_query($con,$sql);

if ($resultado) {
	echo "<script>window.location='../../Views/categorias.php'</script>";
}else{
	echo "<script>alert('Error al Modificar');window.location='../../Views/categorias.php'</script>";
}

?>