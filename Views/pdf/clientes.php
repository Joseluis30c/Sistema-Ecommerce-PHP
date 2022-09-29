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
		$this->Write(15, utf8_decode('Reporte de Clientes'));
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
$fpdf->SetTitle('Reporte Clientes',true);
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
$fpdf->Cell(5, 10, 'ID', 0, 0, 'C', 1);
$fpdf->Cell(25, 10, 'NOMBRE', 0, 0, 'C', 1);
$fpdf->Cell(25, 10, 'APELLIDO', 0, 0, 'C', 1);
$fpdf->Cell(20, 10, 'DNI', 0, 0, 'C', 1);
$fpdf->Cell(20, 10, utf8_decode('TELÉFONO'), 0, 0, 'C', 1);
$fpdf->Cell(30, 10, utf8_decode('DIRECCIÓN'), 0, 0, 'C', 1);
$fpdf->Cell(40, 10, 'CORREO', 0, 0, 'C', 1);
$fpdf->Cell(30, 10, utf8_decode('CONTRASEÑA'), 0, 0, 'C', 1);
$fpdf->Ln();

$fpdf->SetLineWidth(0.3);
$fpdf->SetTextColor(0,0,0);
$fpdf->SetFillColor(255,255,255);
$fpdf->SetDrawColor(80,80,80);

$sql = "SELECT * FROM usu_cliente";
$resultado = mysqli_query($con,$sql);
	while ($fila = $resultado->fetch_assoc()) {
		$fpdf->Cell(5, 10, $fila['id_usu_cli'], 0, 0, 'C', 1);
		$fpdf->Cell(25, 10,utf8_decode($fila['nombre_cli']), 0, 0, 'C',1);
		$fpdf->Cell(25, 10,utf8_decode($fila['apellido_cli']), 0, 0, 'C',1);
		$fpdf->Cell(20, 10,$fila['dni_cli'], 0, 0, 'C',1);
		$fpdf->Cell(20, 10,$fila['telefono_cli'], 0, 0, 'C',1);
		$fpdf->Cell(30, 10,utf8_decode($fila['direccion_cli']), 0, 0, 'C',1);
		$fpdf->Cell(40, 10,utf8_decode($fila['usuario']), 0, 0, 'C',1);
		$fpdf->Cell(30, 10,utf8_decode($fila['contra']), 0, 0, 'C',1);
		$fpdf->Ln();
	}

$fpdf->OutPut('I','Reporte_Clientes.pdf');