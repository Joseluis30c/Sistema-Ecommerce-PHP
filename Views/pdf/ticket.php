<?php 
date_default_timezone_set('America/Lima');
$i=$_GET['id'];
$fecha=date("d-m-Y");
$hora=date('h:i A');
session_start();
  if (empty($_SESSION['active'])) {
    header('location:../../Cliente/salir.php');
  }
require('fpdf/fpdf.php');
require('../../conexion/conexion.php');

$pdf = new FPDF($orientation='P',$unit='mm', array(50,100));
$pdf->SetTitle('Ticket de Venta');
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);    //Letra Arial, negrita (Bold), tam. 20
$pdf->setY(5);
$pdf->setX(10);
$pdf->Cell(8,5,"Tienda de Abarrotes");
$pdf->Ln(3);
$pdf->setX(19);
$pdf->Cell(8,5,"To' Eat");
$pdf->Ln(5);
$pdf->SetFont('Arial','',4);
$pdf->SetX(1);
$pdf->Cell(2,1,"-----------------------------------------------------------------------------------------------");

$pdf->setX(1);
$pdf->Cell(8);
$pdf->Cell(4,5,"Pedido: ");
$pdf->Cell(1);
$pdf->Cell(2,5,' 00'.$i.'');
$pdf->Cell(5);
$pdf->Cell(5,5,$fecha);
$pdf->Cell(5);
$pdf->Cell(5,5,$hora);
$pdf->Ln(4);
$pdf->SetX(1);
$pdf->Cell(2,1,"-----------------------------------------------------------------------------------------------");
$pdf->Ln(1);
$pdf->SetX(1);
$pdf->Cell(2,5,'CANT.');
$pdf->Cell(4);
$pdf->Cell(10,5,'PRODUCTO');
$pdf->Cell(21);
$pdf->Cell(2,5,'IMPORTE');
$pdf->Ln(5);
$pdf->SetX(1);
$pdf->Cell(2,1,"-----------------------------------------------------------------------------------------------");

$sql = "SELECT d.cantidad, p.nombre_produ,d.precio,v.total FROM detalle_ped d INNER JOIN productos p on d.id_pro=p.id_producto INNER JOIN pedidos v on d.id_ped=v.id_ped where d.id_ped=$i";
$resultado = mysqli_query($con,$sql);
while($pro = $resultado->fetch_assoc()){
	$pdf->Ln(2);
	$pdf->SetX(2);
	$pdf->Cell(2, 5, $pro['cantidad'],'C');
	$pdf->Cell(3);
	$pdf->Cell(10, 5,utf8_decode($pro['nombre_produ']));
	$pdf->Cell(22);
	$pdf->Cell(2,5,"S/. ".number_format($pro["cantidad"]*$pro["precio"],2,".",","));
	$pdf->Ln(1);
	$total = $pro["total"];
}
$pdf->Ln();
$pdf->SetX(1);
$pdf->Cell(2,1,"-----------------------------------------------------------------------------------------------");
$pdf->Cell(25);
$pdf->Cell(5,6,"IGV: " );
$pdf->Cell(6);
$pdf->Cell(5,6,"S/. 00.00");
$pdf->Ln(3);
$pdf->Cell(16);
$pdf->Cell(5,5,"TOTAL: " );
$pdf->Cell(8);
$pdf->Cell(5,5,"S/. ".number_format($total,2,".",","));
$pdf->Ln(4);
$pdf->setX(1);
$pdf->Cell(2,2,"-----------------------------------------------------------------------------------------------");
$pdf->SetFont('Arial','',4);
$pdf->Cell(11);
$pdf->Cell(20,7,"GRACIAS POR TU COMPRA");
$pdf->Ln(2);
$pdf->SetFont('Arial','',4);
$pdf->Cell(8);
$pdf->Cell(18,7,"Y por tu preferencia");

$pdf->output('I','ticket_00'.$i.'.pdf');