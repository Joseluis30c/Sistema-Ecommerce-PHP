<?php require_once("../../conexion/conexion.php"); 
$revisar = getimagesize($_FILES["imagen"]["tmp_name"]);
if($revisar !== false){
        $image = $_FILES['imagen']['tmp_name'];
        $imgContenido = addslashes(file_get_contents($image));
        $id=$_POST['id'];
        //Insertar imagen en la base de datos
	$sql="UPDATE productos SET img_produ='$imgContenido' where id_producto=$id";
	$resultado=mysqli_query($con,$sql);
        //COndicional para verificar la subida del fichero
        if ($resultado) {
		echo "<script>window.location='../../Views/productos.php'</script>";
	}else{
		echo "<script>alert('Error al Registrar producto');window.location='../../Views/productos.php'</script>";
	}}
?>

