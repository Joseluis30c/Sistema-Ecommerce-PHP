<?php require_once("../../conexion/conexion.php"); 
$cat=$_POST['txtCat'];

$sql="INSERT INTO categoria(nombre_cat) VALUES('$cat')";
$resultado=mysqli_query($con,$sql);

if ($resultado) {
	echo "<script>window.location='../../Views/categorias.php'</script>";
}else{
	echo "<script>window.location='../../Views/categorias.php'</script>";
}
?>