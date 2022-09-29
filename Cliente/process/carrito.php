<?php
require_once("../../conexion/conexion.php");
session_start();
$id=$_SESSION['id'];
$total = $_POST['totalp'];
date_default_timezone_set('America/Lima');
$fecha = date('Y-m-d');
if(!empty($_SESSION["shopping_cart"]))
{
    $pedido=mysqli_query($con, "INSERT INTO pedidos(fecha, id_cli, total) VALUES ('$fecha', '$id', '$total')");
    $idd= mysqli_insert_id($con);
    if ($pedido) {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
        $sql=mysqli_query($con,"INSERT INTO detalle_ped (id_ped, id_pro, cantidad, precio) VALUES ('$idd','".$values['item_id']."', '".$values['item_quantity']."', '".$values['item_price']."')");
        if($sql){
               $producto="update productos SET stock = stock - '".$values['item_quantity']."' where id_producto = '".$values['item_id']."'";
               $result=mysqli_query($con,$producto);
           }
        }
          
    }   
header('location:../carrito.php?action=vaciar');
}else{
        echo "<script>ERROR AL SOLICITAR PEDIDO</script>";
    }

?>
