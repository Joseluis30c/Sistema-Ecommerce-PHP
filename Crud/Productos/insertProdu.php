<?php require_once("../../conexion/conexion.php"); 
$revisar = getimagesize($_FILES["image"]["tmp_name"]);
if($revisar !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContenido = addslashes(file_get_contents($image));
        $producto=$_POST['txtProdu'];
		$detalle=$_POST['txtDetalle'];
		$precio=$_POST['txtPrecio'];
		$cant=$_POST['txtStock'];
		$cat=$_POST['idcat'];
        
        //Insertar imagen en la base de datos
		$sql="INSERT INTO productos(nombre_produ, detalle, precio_produ, img_produ, stock, id_categoria) VALUES('$producto','$detalle','$precio','$imgContenido','$cant','$cat')";
		$resultado=mysqli_query($con,$sql);
        // COndicional para verificar la subida del fichero
        if ($resultado) {
			echo "<script>window.location='../../Views/productos.php'</script>";
		}else{
			echo "<script>alert('Error al Registrar producto');window.location='../../Views/productos.php'</script>";
		}}
?>



