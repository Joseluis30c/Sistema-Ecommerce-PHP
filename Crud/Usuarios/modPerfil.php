<?php 
require_once("../../conexion/conexion.php");
$id=$_POST['id'];
$nombre=$_POST['nom'];
$apellido=$_POST['ape'];
$dni=$_POST['dni'];
$tel=$_POST['tel'];
$correo=$_POST['email'];
$pas=$_POST['pass'];

$sql="UPDATE usu_empleado SET nombre_emple='$nombre', apellido_emple='$apellido', dni_emple='$dni', telefono_emple='$tel', usuario='$correo', contra='$pas' where id_usu_emple='$id'";
$result=mysqli_query($con,$sql);
if ($result) {
	echo "<script>alert('Cambios Guardados, Inicia Sesión Nuevamente');window.location='../../Views/saliradmin.php'</script>";
}else{
	echo "<script>alert('ERROR AL CAMBIAR DATOS');window.location='../../Views/perfil.php'</script>";
}
?>