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
		$this->Write(15, utf8_decode('Reporte de Productos'));
		$this->Ln();
	}

	public function footer()
	{
		// Posición: a 1,5 cm del final
        $this->SetY(-45);
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
$fpdf->SetTitle('Reporte de Productos',true);
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
$fpdf->Cell(10, 10, 'ID', 0, 0, 'C',1);
$fpdf->Cell(100, 10, 'PRODUCTO', 0, 0, 'C',1);
$fpdf->Cell(30, 10, 'PRECIO', 0, 0, 'C',1);
$fpdf->Cell(15, 10, 'STOCK', 0, 0, 'C',1);
$fpdf->Cell(30, 10, utf8_decode('CATEGORÍA'), 0, 0,'C',1);

$fpdf->Ln();

$fpdf->SetTextColor(0,0,0);
$fpdf->SetFillColor(255,255,255);
$fpdf->SetDrawColor(80,80,80);

$sql = "SELECT * FROM productos p INNER JOIN categoria c on p.id_categoria=c.id_categoria";
$resultado = mysqli_query($con,$sql);
	while ($fila = $resultado->fetch_assoc()) {

		$fpdf->Cell(10, 10, $fila['id_producto'], 0, 0, 'C');
		$fpdf->Cell(100,10,utf8_decode($fila['nombre_produ']), 0, 0);
		$fpdf->Cell(30, 10,'S/. '.$fila['precio_produ'].'', 0, 0, 'C');
		$fpdf->Cell(15, 10,$fila['stock'], 0, 0, 'C',1);
		$fpdf->Cell(30, 10,utf8_decode($fila['nombre_cat']), 0, 0);
		$fpdf->Ln();
	}

$fpdf->OutPut('I','Reporte_productos.pdf');