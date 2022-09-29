<?php 
$i=$_GET['id'];
session_start();
  if (empty($_SESSION['active'])) {
    header('location:../../Cliente/salir.php');
  }

$nombre=$_SESSION['nomb'];
$apellido=$_SESSION['ape'];
$dni=$_SESSION['dni'];
$tel=$_SESSION['tel'];
$dir=$_SESSION['dir'];
require('fpdf/fpdf.php');
require('../../conexion/conexion.php');
$sql=mysqli_query($con,"SELECT * from pedidos where id_ped=$i");
class pdf extends FPDF
{
	public function header()
	{
		$this->SetFillColor(30, 29, 29 );
		$this->Rect(0,0, 220, 50, 'F');
		$this->SetY(25);
		$this->SetFont('Arial', 'B', 30);
		$this->SetTextColor(255,255,255);
		$this->Write(15, utf8_decode('Boleta de Venta'));
		$this->Ln();
	}

	public function footer()
	{
		$this->SetY(-55);
		$this->Cell(75);
		$this->Cell(50, 10, 'GRACIAS POR TU COMPRA Y TU PREFERENCIA ', 0, 0, 'C');
		// Posición: a 1,5 cm del final
    $this->SetY(-45);
    // Arial italic 8
    $this->SetFont('Arial', 'I', 8);
    // Número de página
    $this->Cell(75);
    $this->Cell(50, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');

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
$fpdf->SetTitle('Boleta de Venta');
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
$fpdf->Image('../../Assets/home/images/icons/log.png', 20, 55);
$fpdf->SetY(60);
$fpdf->SetX(140);
$fpdf->Write(5, utf8_decode('PARA:             '.$nombre.' '.$apellido.''));
$fpdf->Ln(7);
$fpdf->SetX(140);
$fpdf->Write(5, 'DNI:                '.$dni.'');
$fpdf->Ln(7);
$fpdf->SetX(140);
$fpdf->Write(5, utf8_decode('DIRECCIÓN:  '.$dir.''));
$fpdf->Ln(7);
$fpdf->SetX(140);
$fpdf->Write(5, utf8_decode('TELÉFONO:   '.$tel.''));

$fpdf->SetFont('Arial', '', 10);
$fpdf->SetY(100);
$fpdf->SetTextColor(255,255,255);
$fpdf->SetFillColor(79,78,77);
$fpdf->Cell(20);
$fpdf->Cell(75, 10, 'PRODUCTO', 0, 0, 'I', 1);
$fpdf->Cell(25, 10, 'CANT.', 0, 0, 'C', 1);
$fpdf->Cell(40, 10, 'PRECIO X UNID.', 0, 0, 'C', 1);
$fpdf->Cell(20, 10, 'IMPORTE', 0, 0, 'C', 1);
$fpdf->Ln();

$fpdf->SetLineWidth(0.3);
$fpdf->SetTextColor(0,0,0);
$fpdf->SetFillColor(255,255,255);
$fpdf->SetDrawColor(80,80,80);

$sql = "SELECT v.total,v.fecha, d.cantidad, p.nombre_produ,d.precio,v.total FROM detalle_ped d INNER JOIN productos p on d.id_pro=p.id_producto INNER JOIN pedidos v on d.id_ped=v.id_ped where d.id_ped=$i";
$resultado = mysqli_query($con,$sql);
	while ($fila = $resultado->fetch_assoc()) {
		$fpdf->Cell(20);
		$fpdf->Cell(75, 10,utf8_decode($fila['nombre_produ']), 0, 0, 'I',1);
		$fpdf->Cell(25, 10,utf8_decode($fila['cantidad']), 0, 0, 'C',1);
		$fpdf->Cell(40, 10,'S/. '.number_format($fila['precio'],2,".",",").'', 0, 0, 'C',1);
		$fpdf->Cell(20, 10,'S/. '.number_format($fila['precio']*$fila['cantidad'],2,".",",").'', 0, 0, 'C',1);
		$fpdf->Ln(15);
		$total = $fila['total'];
	}
$fpdf->Cell(140);
$fpdf->Cell(10, 10, 'TOTAL: ', 0, 0,'R');
$fpdf->Cell(17);
$fpdf->Cell(10, 10, 'S/. '.number_format($total,2,".",",").'', 0, 0,'R');

$fpdf->OutPut('I','Boleta_00'.$i.'.pdf');