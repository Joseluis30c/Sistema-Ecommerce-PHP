<?php
session_start();
  if (empty($_SESSION['active'])) {
    header('location:../saliradmin.php');
  }
require('fpdf/fpdf.php');
require('../../conexion/conexion.php');
class pdf extends FPDF
{
	public function header()
	{
		$this->SetFillColor(30, 29, 29 );
		$this->Rect(0,0, 220, 50, 'F');
		$this->SetY(25);
		$this->SetFont('Arial', 'B', 30);
		$this->SetTextColor(255,255,255);
		$this->Write(15, utf8_decode('Reporte de Pedidos'));
		$this->Ln();
	}

	public function footer()
	{
		// Posición: a 1,5 cm del final
        $this->SetY(-40);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');

		$this->SetFillColor(30, 29, 29);
		$this->Rect(0, 250, 220, 50, 'F');
		$this->SetY(-20);
		$this->SetFont('Arial', '', 10);
		$this->SetTextColor(255,255,255);
		$this->SetX(120);
		$this->Write(3, 'Tienda de Abarrotes To Eat');
		$this->Ln();
		$this->SetX(120);
		$this->Write(5, 'abarrotestoeat@gmail.com');
		$this->SetX(120);
		$this->Ln();
		$this->SetX(120);
		$this->Write(5, '+51 999 999 999');
	}
}

$fpdf = new pdf('P','mm','letter',true);
$fpdf->SetTitle('Reporte de Ventas',true);
$fpdf->AliasNbPages();
$fpdf->AddPage();
$fpdf->SetMargins(10,30,20,20);
$fpdf->SetFont('Arial', '', 9);
$fpdf->SetTextColor(255,255,255);

$fpdf->SetY(25);
$fpdf->SetX(160);
$fpdf->Write(5, 'Tienda de Abarrotes ');
$fpdf->Ln();
$fpdf->SetX(160);
$fpdf->Write(5, 'Fecha: '. date("d/m/Y"));
$fpdf->Ln();
$fpdf->SetX(160);
$fpdf->Write(5, 'De: Jose Luis Chavesta');
$fpdf->Ln();

$fpdf->SetTextColor(0,0,0);
$fpdf->Image('../../Assets/home/images/icons/log.png', 50, 55);

$fpdf->SetY(100);
$fpdf->SetTextColor(255,255,255);
$fpdf->SetFillColor(79,78,77);
$fpdf->Cell(5);
$fpdf->Cell(20, 10, utf8_decode('N° PEDIDO'), 0, 0, 'C', 1);
$fpdf->Cell(25, 10, 'CLIENTE', 0, 0, 'C', 1);
$fpdf->Cell(55, 10, 'PRODUCTO', 0, 0, 'C', 1);
$fpdf->Cell(25, 10, 'CANTIDAD', 0, 0, 'C', 1);
$fpdf->Cell(30, 10, 'PRECIO X UNID.', 0, 0, 'C', 1);
$fpdf->Cell(30, 10, 'IMPORTE', 0, 0, 'C', 1);
$fpdf->Ln();

$fpdf->SetTextColor(0,0,0);
$fpdf->SetFillColor(255,255,255);
$fpdf->SetDrawColor(80,80,80);

$sql = "SELECT p.id_ped,c.nombre_cli,c.apellido_cli,e.nombre_produ,d.precio,d.cantidad FROM pedidos p INNER JOIN usu_cliente c on p.id_cli=c.id_usu_cli INNER JOIN detalle_ped d on p.id_ped=d.id_ped INNER JOIN productos e on d.id_pro=e.id_producto order by p.id_ped";
$resultado = mysqli_query($con,$sql);
	while ($fila = $resultado->fetch_assoc()) {
		$fpdf->Cell(5);
		$fpdf->Cell(20, 10, $fila['id_ped'], 0, 0, 'C', 1);
		$fpdf->Cell(25, 10,utf8_decode($fila['nombre_cli'].' '.$fila['apellido_cli']), 0, 0, 'C',1);
		$fpdf->Cell(55, 10,utf8_decode($fila['nombre_produ']), 0, 0, 'I',1);
		$fpdf->Cell(25, 10,$fila['cantidad'], 0, 0, 'C',1);
		$fpdf->Cell(30, 10,'S/. '.number_format($fila['precio'],2,".",",").'', 0, 0, 'C',1);
		$fpdf->Cell(30, 10,'S/. '.number_format($fila['precio']*$fila['cantidad'],2,".",",").'', 0, 0, 'C',1);
		$fpdf->Ln();
	}

$fpdf->OutPut('I','Reporte_Pedidos.pdf');