<?php require_once("../../conexion/conexion.php"); 
        //$image = $_FILES['image']['tmp_name'];
       // $imgContenido = addslashes(file_get_contents($image));
        $id=$_REQUEST['id'];
        $producto=$_REQUEST['txtProdu'];
	$detalle=$_REQUEST['txtDetalle'];
	$precio=$_REQUEST['txtPrecio'];
	$cant=$_REQUEST['txtStock'];
	$cat=$_REQUEST['idcat'];
        
        //Modificar imagen en la base de datos
		$sql=("UPDATE productos SET 
		nombre_produ='" .$producto. "',
		detalle='" .$detalle. "', 
		precio_produ='" .$precio. "',  
		stock='" .$cant. "',
		id_categoria='" .$cat. "'
		WHERE id_producto='" .$id. "'");

		$resultado=mysqli_query($con,$sql);

        if ($resultado) {
			echo "<script>window.location='../../Views/productos.php'</script>";
		}else{
			echo "<script>alert('Error al Modificar producto');window.location='../../Views/productos.php'</script>";
		}
?>