<?php
//Archivo de conexión a la base de datos
require_once('conexion/conexion.php');

//Variable de búsqueda
$consultaBusqueda = $_POST['valorBusqueda'];

//Filtro anti-XSS
$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);

//Variable vacía (para evitar los E_NOTICE)
$mensaje = "";
$mensaje2="";


//Comprueba si $consultaBusqueda está seteado
if (isset($consultaBusqueda)) {

	//donde el nombre sea igual a $consultaBusqueda
	$consulta = mysqli_query($con, "SELECT * FROM productos p INNER JOIN categoria c on p.id_categoria=c.id_categoria WHERE nombre_produ LIKE '%$consultaBusqueda%' 
	OR nombre_cat LIKE '%$consultaBusqueda%'");
	//Obtiene la cantidad de filas que hay en la consulta

	$filas = mysqli_num_rows($consulta);

	//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
	if ($filas === 0) {
		$mensaje = "<div>No hay ningún producto con ese nombre y/o categoria</div>";
	} else {
		foreach($consulta as $resultados) {
			$nombre = $resultados['nombre_produ'];
			$precio = $resultados['precio_produ'];
			$id_pro = $resultados['id_producto'];
			$cat = $resultados['nombre_cat'];
			$img = $resultados['img_produ'];
			//Output
			$mensaje .= '
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="data:image/jpeg;base64,'.base64_encode($img).'"/>

                            <a href="detail_producto.php?id='.$id_pro.'&cat='.$cat.'" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                Ver Producto
                            </a>
                        </div> 

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="detail_producto.php?id='.$id_pro.'&cat='.$cat.'" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    ' . $nombre . '
                                </a>

                                <span class="stext-105 cl3">
                                    S/.' . $precio . '
                                </span>
                            </div>
                        </div>
                    </div>
                </div>';
		};//Fin while $resultados

	}; //Fin else $filas

};//Fin isset $consultaBusqueda

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>