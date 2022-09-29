<?php require_once("../../conexion/conexion.php");

$nombre=$_POST['txtNombre'];
$apellido=$_POST['txtApellido'];
$dni=$_POST['txtDni'];
$tel=$_POST['txtTelefono'];
$user=$_POST['txtUser'];
$pas=$_POST['txtContraseña'];
$tipo=$_POST['txtRol'];
$estado=$_POST['Estado'];

$sql="INSERT INTO usu_empleado(nombre_emple, apellido_emple, dni_emple, telefono_emple, usuario, contra, id_tipousu, estado) VALUES('$nombre','$apellido','$dni','$tel','$user','$pas','$tipo','$estado')";
$resultado=mysqli_query($con,$sql);
if ($resultado) {
	echo "<script>window.location='../../Views/usuarios.php'</script>";
}else{
	echo "error";
}
?>