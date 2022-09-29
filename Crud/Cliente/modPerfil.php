<?php 
require_once("../../conexion/conexion.php");
$id=$_POST['id'];
$nombre=$_POST['nom'];
$apellido=$_POST['ape'];
$dni=$_POST['dni'];
$tel=$_POST['tel'];
$dir=$_POST['dir'];
$correo=$_POST['email'];
//$pas=$_POST['pass'];

$sql="UPDATE usu_cliente SET nombre_cli='$nombre', apellido_cli='$apellido', dni_cli='$dni', telefono_cli='$tel', direccion_cli='$dir', usuario='$correo' where id_usu_cli='$id'";
$result=mysqli_query($con,$sql);
if ($result) {
	echo "<script>alert('Cambios guardados, Inicia sesion Nuevamente');window.location='../../Cliente/salir.php'</script>";
}else{
	echo "<script>alert('error');window.location='../../Cliente/perfil.php'</script>";
}
?>


